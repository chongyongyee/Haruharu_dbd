<?php


use App\Models\SystemSetting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

function _array_reverse($array): array
{
    return $array && is_array($array) && count($array) ? array_reverse($array) : [];
}

function decodedData($request, $field, $type = false)
{
    return is_array($request->$field) ? json_decode(json_encode($request->$field), $type) :
        json_decode($request->$field, $type);
}

function nullToString($value): ?string
{
    return $value ?? '';
}

function formatDate($date, $format = DATE_FORMAT): string
{
    return nullToString($date) !== '' ? \Carbon\Carbon::parse($date)->format($format) : '';
}

function formatDateTime($dateTime): string
{
    return nullToString($dateTime) !== '' ? \Carbon\Carbon::parse($dateTime)->format(DATE_TIME_FORMAT) : '';
}

function convertTimestampToDate($timestamp): string
{
    return $timestamp ? date(DATE_TIME_FORMAT, $timestamp) : '';
}

function chars(): array
{
    return range('A', 'Z');
}

function questions(): array
{
    return [
        ['questions' => 'First Name', 'field' => 'text', 'field_name' => 'first_name'],
        ['questions' => 'Last Name', 'field' => 'text', 'field_name' => 'last_name'],
        ['questions' => 'Your Email?', 'field' => 'email', 'field_name' => 'email'],
        ['questions' => 'Your store URL?', 'field' => 'url', 'field_name' => 'url'],
        ['questions' => 'Approximately how many orders do you ship per month?', 'field' => 'option', 'field_name' => 'option'],
        ['questions' => 'How many different SKUs do you need to ship?', 'field' => 'text', 'field_name' => 'text'],
    ];
}

function isSsl($url): bool
{
    return 'https://' === \substr($url, 0, 8);
}

function isAdmin(): bool
{
    return auth()->user()->isAdmin();
}

function isVendor(): bool
{
    return auth()->user()->isVendor();
}

function isUser(): bool
{
    return auth()->user()->isUser();
}

function wireKey($id): string
{
    return md5(uniqid($id, true));
}

function encodeID($id, $length = 8): string
{
    config(['hashids.connections.main.length' => $length]);

    return $id !== null && $id !== '' && $id !== NO ? \Vinkla\Hashids\Facades\Hashids::encode($id) : '';
}

function decodeID($id, $length = 8): string
{
    config(['hashids.connections.main.length' => $length]);

    try {
        $decodedID = \Vinkla\Hashids\Facades\Hashids::decode($id);

        return $decodedID[0];

    } catch (\Exception $exception) {
        return '';
    }
}

function convertToKG($value, $unit = 'lb')
{

    $unit = strtoupper($unit);
    $value = (float)$value;

    if ($value === 0.00) return $value;

    elseif ($unit === 'KG') return $value;

    $value = $value * WEIGHT_UNITS[$unit];

    return sprintf("%0.2f", $value);
}

function formatValue($value): float
{
    $value = nullToString($value);

    return $value !== '' ? (float)$value : 0.00;
}

function parseUrl($url): string
{
    $parsedUrl = parse_url($url);
    if (!isset($parsedUrl['scheme']))
        return 'https://' . $url;

    return $url;
}

function nullToEmptyString($value): string
{
    return $value === null ? '' : $value;
}

function formatAmount($amount, $currency = 'USD'): string
{
    $amount = nullToEmptyString($amount);
    if ($amount === '')
        return $amount;

    $currency = $currency ?? 'USD';
    $amount = (float)$amount;

    $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);

    return $formatter->formatCurrency($amount, strtoupper($currency));
}

function getValue($data, $keys, $default = '')
{
    if (is_array($data) || is_object($data)) {
        $data = is_array($data) ? $data : $data->toArray();
//        $data = is_array($data) ? $data : json_decode(json_encode($data), true);
        $value = \Illuminate\Support\Arr::get($data, $keys, $default);

        return $default && !$value ? $default : $value;
    }

    return 'not found anything';
}

function getRouteAlias(): ?string
{
    $alias = 'admin';

    if (auth()->check()) {
        $user = auth()->user();

        if ($user->isVendor())
            $alias = 'vendor';

        else if ($user->isUser())
            $alias = 'user';
    }

    return $alias;
}

function isOk($value): bool
{
    return (int)$value === YES;
}

function _object_get($data, $keys, $default = null)
{

    return \Illuminate\Support\Arr::get($data->toArray(), $keys, $default);
}


function dd_on(int $number, ...$args)
{
    if (!isset($GLOBALS['dd'])) {
        $GLOBALS['dd'] = 0;
    }

    if ($GLOBALS['dd'] === $number) {
        $GLOBALS['dd'] = 0;
        dd(...$args);
    }

    $GLOBALS['dd']++;
}

function formatTimestamp($timestamp): ?string
{
    return $timestamp ? Carbon::createFromTimestamp($timestamp)->toDateTimeString() : null;
}

function remainingDaysSubscription($datetime): ?string
{
    return $datetime ? Carbon::parse($datetime)->diffInDays(Carbon::now()) : null;
}

if (!function_exists('updatedSubscriptionUsage')) {
    function updatedSubscriptionUsage($user, $type = 'STORE', $operator = 'PLUS', $quantity = 1)
    {
        if (is_object($user) && $user->isVendor() && $user->subscription && $user->subscription->isActive()) {
            if ($type === 'STORE') {
                if ($operator === 'PLUS') {
                    $user->subscription->store_usage->used += $quantity;
                    $user->subscription->store_usage->current_month_count += $quantity;
                } elseif ($operator === 'MINUS') {
                    $user->subscription->store_usage->used -= $quantity;
                    $user->subscription->store_usage->current_month_count -= $quantity;
                }

                $user->subscription->store_usage->save();
            } elseif ($type === 'ORDER') {
                if ($operator === 'PLUS') {
                    $user->subscription->order_usage->used += $quantity;
                    $user->subscription->order_usage->current_month_count += $quantity;
                } elseif ($operator === 'MINUS') {
                    $user->subscription->order_usage->used -= $quantity;
                    $user->subscription->order_usage->current_month_count -= $quantity;
                }

                $user->subscription->order_usage->save();
            }
        }
    }
}

function remainingOrders($user)
{
    if (!$user->isVendor() || !$user->subscription && !$user->subscription->isActive())
        return 0;

    return $user->subscription->store_usage->limit - $user->subscription->store_usage->used;
}

function isNegative($value)
{
    if (isset($value)) {
        if ((int)$value > 0)
            return false;

        return (int)$value < 0 && substr(strval($value), 0, 1) === "-";
    }
}

function getDomainName($url)
{
    $urlExplode = explode('www.', $url);

    if (count($urlExplode) > 1)
        return $urlExplode[1];

    $urlExplode = parse_url($url);

    return $urlExplode['host'] ?? $url;
}

function isNullOrEmpty($value)
{
    return is_null($value) || empty($value);
}

function getSubdomain(?string $hostname = null)
{
    if (!$hostname)
        return null;

    $hostname = getDomainName($hostname);

    if (env('APP_URL') === $hostname)
        return null;

    $parts = explode('.', $hostname);

    return count($parts) ? $parts[0] : null;
}

if (!function_exists('isBaseUrl')) {
    function isBaseUrl($host = ''): bool
    {
        $host = $host ?: request()->getHost();

        return getSubdomain($host) === null;
    }
}

if (!function_exists('isTenantUrl')) {
    function isTenantUrl($host = ''): bool
    {
        return !isBaseUrl($host);
    }
}

if (!function_exists('generateUserGlobalID')) {
    function generateUserGlobalID($column = 'global_id')
    {
        $existedGlobalID = User::where('is_super_admin', NO)->latest()->first();

        return is_object($existedGlobalID) ? $existedGlobalID->$column + 1 : 1001;
    }
}

if (!function_exists('convertToDecimal')) {
    function convertToDecimal($amount)
    {
        try {
            return number_format(((float)$amount / 100), 2);

        } catch (\Exception $exception) {
            return $amount;
        }
    }
}

if (!function_exists('convertToNumber')) {
    function convertToNumber($amount)
    {
        try {
            return ((float)$amount * 100);

        } catch (\Exception $exception) {
            return $amount;
        }
    }
}

if (!function_exists('centralDBConnection')) {
    function centralDBConnection()
    {
        config([
            'database.default' => 'landlord',
        ]);

        DB::reconnect('landlord');
    }
}

if (!function_exists('tenantDBConnection')) {
    function tenantDBConnection($dbName)
    {
        config([
            'database.default' => 'tenant',
            'database.connections.tenant.database' => $dbName,
        ]);

        DB::reconnect('tenant');
    }
}

if (!function_exists('userID')) {
    function userID()
    {
        return auth()->user()->isSuperAdmin() ? auth()->id() : auth()->user()->global_id;
    }
}

if (!function_exists('hasUrlWWW')) {
    function hasUrlWWW(): bool
    {
        $urlExplode = explode('www.', request()->getHost());

        return count($urlExplode) > 1;
    }
}

if (!function_exists('hasUserPostSettings')) {
    function hasUserPostSettings($type, $user = false): bool
    {
        $user = $user ?: auth()->user();
        $systemSettings = $user->systemSettings;

        if (!is_object($systemSettings))
            $systemSettings = SystemSetting::default();

        switch ($user->userType()) {
            case _3PL:
                return !($systemSettings->{$type}['apiKey'] === null);
            case _ECOMM:
                return $systemSettings->{$type}['apiKey'] !== null;
            case JUST_STARTED_USER:
                return false;
            default:
                return true;
        }
    }
}

if (!function_exists('calculateTotalAndSystemCharges')) {
    function calculateTotalAndSystemCharges($postService = '', $amount = 0): array
    {
        $total = willUserChargeForPostService($postService) ? setPostServiceAmount($amount) : $amount;

        $systemCharges = $total - $amount;

        return [$total, $systemCharges];
    }
}

if (!function_exists('shipmentChargedBy')) {
    function shipmentChargedBy($postService = ''): string
    {
        return willUserChargeForPostService($postService) ? SHIPMENT_CHARGED_BY['VENDOR'] : SHIPMENT_CHARGED_BY['SYSTEM'];
    }
}

if (!function_exists('hasUserPostSetting')) {
    function hasUserPostSetting($postType = '', $user = false)
    {
        $user = $user ?: auth()->user();
        $systemSettings = $user->systemSettings;

        if (!is_object($systemSettings) && !$user->isJustStartedUser())
            return false;

        return !($systemSettings->{$postType}['apiKey'] === null);
    }
}

if (!function_exists('willUserChargeForPostService')) {
    function willUserChargeForPostService($post = '', $user = false): bool
    {
        $user = $user ?: auth()->user();

        if ($user->isJustStartedUser())
            return true;

        return $user->isEcomm() && $user->systemSettings->{$post}['apiKey'] === null;
    }
}

if (!function_exists('getPostSettings')) {
    function getPostSettings($postService = '', $user = null): array
    {
        $user = $user ?? auth()->user();

        if(hasUserPostSettings($postService, $user)) {
            $userId = $user->global_id;

            if ($user->isChild())
                $userId = $user->parent_user->global_id;

            $postSettings = SystemSetting::where('user_id', $userId)->first();
        }else
            $postSettings = SystemSetting::where('type', ADMIN)->first();

        return $postSettings->{$postService};
    }
}

if (!function_exists('setPostServiceAmount')) {
    function setPostServiceAmount($amount, $percentage = FIXED_PERCENTAGE)
    {
        $percentage = str_replace("%", "", $percentage);
        return $amount + ($amount * ($percentage / 100));
    }
}

if (!function_exists('getShippingUrl')) {

    function getShippingUrl($shippingType = ''):string
    {
        if ($shippingType === SHIPPING_CARRIERS['Australia Post'])
            return app()->environment(['staging', 'local']) ? AUS_POST_BASE_SHIPPING_URL : AUS_POST_BASE_SHIPPING_URL_LIVE;

        elseif ($shippingType === SHIPPING_CARRIERS['Sendle'])
            return  app()->environment(['staging', 'local']) ? SENDLE_BASE_URL : SENDLE_BASE_URL_LIVE;

        return '';
    }
}

if (!function_exists('removeFileFromStorage')) {
    function removeFileFromStorage($filePath = '', $storageDisk = 'public')
    {
        if (Storage::disk($storageDisk)->exists($filePath))
            Storage::disk($storageDisk)->delete($filePath);
    }
}

if (!function_exists('removeFile')) {
    function removeFile($filePath = '')
    {
        if (File::exists(public_path($filePath)))
            File::delete(public_path($filePath));
    }
}

if (!function_exists('isInternational')) {
    function isInternational($countryCode)
    {
        return (strtoupper($countryCode) !== AUSTRALIA_COUNTRY_CODE) ? YES : NO;
    }
}

if (!function_exists('updateAddressProperty')) {
    function updateAddressProperty($address = []): array
    {
        return [
            'country' => $address['country'] ?? null,
            'country_code' => $address['country_code'] ?? null,
            'complete_address' => $address['complete_address'] ?? null,
            'address1' => $address['address1'] ?? null,
            'state' => $address['state'] ?? null,
            'state_code' => $address['state_code'] ?? null,
            'city' => $address['city'] ?? null,
            'zip' => $address['postal_code'] ?? null,
        ];
    }
}

if (!function_exists('dateFromTimeStamp')) {

    function dateFromTimeStamp(string $timestamp = ''): ?string
    {
        return $timestamp ? Carbon::createFromTimestamp($timestamp)->toDateTimeString() : null;
    }
}

if (!function_exists('convertDateToTimestamp')) {

    function convertDateToTimestamp(string $data = ''): ?string
    {
        return $data ? Carbon::parse($data)->timestamp : null;
    }
}

if (!function_exists('getShipmentTrackingLink')) {

    function getShipmentTrackingLink($shipment): ?string
    {
        $trackingLink = '';

        if (!is_object($shipment))
            return $trackingLink;

        $shippingCarrier = strtoupper($shipment->shipping_carrier);

        if ($shippingCarrier === strtoupper(SHIPPING_CARRIERS['Australia Post']))
            return "https://auspost.com.au/mypost/track/#/details/{$shipment->article_id}";

        elseif ($shippingCarrier === strtoupper(SHIPPING_CARRIERS['Sendle']))
            return "https://track.sendle.com/tracking?ref={$shipment->article_id}";

        elseif ($shippingCarrier === strtoupper(SHIPPING_CARRIERS['Zoom2u']))
            return "https://trackthispackage.com/tispackpage2139/?tpg={$shipment->article_id}";

        return '';
    }
}

if (!function_exists('generateFileName')) {

    function generateFileName($dateTime, $fileName = '', $fileExt = '.pdf'): string
    {
        return Carbon::parse($dateTime)->toDateTimeString().'-'.$fileName.$fileExt;
    }
}

if (!function_exists('getCurrencySymbol')) {

    function getCurrencySymbol($currencyCode, $locale = 'en_US')
    {
        $formatter = new \NumberFormatter($locale . '@currency=' . $currencyCode, \NumberFormatter::CURRENCY);
        return $formatter->getSymbol(\NumberFormatter::CURRENCY_SYMBOL);
    }
}

if (!function_exists('setShippingCurrency')) {

    function setShippingCurrency($currencyCode): string
    {
        return isInternational($currencyCode) ? 'USD' : 'AUD';
    }
}

if (!function_exists('appInProduction')) {
    function appInProduction(): bool
    {
        return (bool)app()->environment('production');
    }
}

if (!function_exists('appInDevelopment')) {
    function appInDevelopment(): bool
    {
        return app()->environment('local');
    }
}

if (!function_exists('appInStaging')) {
    function appInStaging(): bool
    {
        return app()->environment('staging');
    }
}

if (!function_exists('str_slug')) {
    function str_slug($string): string
    {
        return \Illuminate\Support\Str::slug($string);
    }
}
