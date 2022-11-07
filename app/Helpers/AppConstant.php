<?php

const APP_NAME = 'eCommerce Shipping';
const APP_URL = 'https://ecommerceshipping.io';
const SHOPIFY_APP_URL = 'https://app.ecommerceshipping.io';
const PUBLIC_IP_RESOURCE = "http://ipecho.net/plain";

const USER_START_UUID_CHAR = 'AA';
const USER_START_UUID_DIGIT = '0001';

const USER_UUID = USER_START_UUID_CHAR.USER_START_UUID_DIGIT;
const USER_END_UUID_DIGIT = '9999';

const AUSTRALIA_COUNTRY_CODE = 'AU';

const SHOPIFY_MODAL = 'SHOPIFY_MODAL';
const WOOCOMMERCE_MODAL = 'WOOCOMMERCE_MODAL';
const CUSTOM_MODAL = 'CUSTOM_MODAL';

const NONE = 0;
const NO = 0;
const YES = 1;
const DE_ACTIVE = 0;

const USER = 0;
const VENDOR = USER;
const ADMIN = 1;
const SUPER_ADMIN = 1;

const INTERNAL = 'Internal';

const LOW_RISK = 3;
const MEDIUM_RISK = 2;
const HIGH_RISK = 1;

const PROFILE_PHOTO_PATH = 'profile-photos';
const INVENTORY_UPLOAD_PATH = 'inventory-uploads';
const ORDER_UPLOAD_PATH = 'order-uploads';

const PAGINATION_LENGTH = 20;
const ORDER_BY_COLUMN = 'id';
const ORDER_BY_DIRECTION = 'ASC';

const WEB = 'WEB';
const API = 'API';

const MIN_AGE = 18;

const DATE_FORMAT = 'm/d/Y';
const DATE_MONTH_FORMAT = 'd M Y';
const MYSQL_DATE_FORMAT = 'Y-m-d';
const DATE_TIME_FORMAT = 'm/d/Y H:i A';

const FEMALE = 0;
const MALE = 1;
const OTHERS = 2;

const GENDER = [
    FEMALE => 'Female',
    MALE => 'Male',
    OTHERS => 'Others',
];

const DEFAULTVAL = 'default';
const VARIABLE = 'variable';

const SHOPIFY = 'SHOPIFY';
const REGULAR = 'REGULAR';
const CUSTOM = 'CUSTOM';
const SQUARE_SPACE = 'SQUARE_SPACE';
const WOOCOMMERCE = 'WOOCOMMERCE';
const STORE = [
    SHOPIFY => SHOPIFY,
    WOOCOMMERCE => WOOCOMMERCE
];

const AUSPOSTMAXWEIGHT = 22;

const UNLIMITED = 0;
const _ECOMM = 'Ecommerce Brand';
const _3PL = '3PL';
const JUST_STARTED_USER = 'Just Started';
const FIXED_PERCENTAGE = 15;

const GRAM = 0.001;
const OUNCE = 0.0283;
const POUND = 0.453592;

const WEIGHT_UNITS = [
    'LB' => POUND,
    'OZ' => OUNCE,
    'G' => GRAM,
];

const CONFIRMED = 'CONFIRMED';
const PROCESSING = 'PROCESSING';
const CANCELLED = 'CANCELLED';
const ORDER_STATUS = [
    PROCESSING => PROCESSING,
    CONFIRMED => CONFIRMED
];

const INVENTORY_UPLOAD_HEADERS = ["sku", "action", "quantity", "reason"];

const ORDER_UPLOAD_HEADERS = [
    "orderno", "tax", "discount", "shipping",
    "carrier", "shippingfirstname", "shippinglastname", "phone","email",
    "address", "address2", "country", "state",
    "city", "zip", "isaddresssame", "billingfirstname", "billinglastname",
    "billingemail","billingphone", "billingaddress", "billingcountry",
    "billingstate","billingcity","billingzip"
];

const SHIPPING_CARRIERS = [
    'Australia Post' => 'Australia Post',
    'Sendle' => 'Sendle',
    'Mailplus' => 'Mailplus',
    'Zoom2u'=>'Zoom2u',
    'sherpa'=>'Sherpa'
];

const SHIPMENT_TYPE = [
    'AUSTRALIAN_POST' => 'AUSTRALIAN_POST',
    'Sendle' => 'Sendle',
    'Zoom' => 'Zoom2u'
];
const SHIPMENT_STATUS = [
    'Delivered' => 'Delivered',
];

const AUS_POST_CLASSIFICATION_TYPE = ['g' => 'GIFT', 's' => 'SAMPLE', 'd' => 'DOCUMENT', 'r' => 'RETURN', 'sg' => 'SALE_OF_GOODS', 'o' => 'OTHER'];

const CREATED = 'created';
const TRANSIT = 'transit';
const DELIVERED = 'delivered';

const _DEFAULT = 'DEFAULT';
const LOW = 'LOW';
const HIGH = 'HIGH';

const ORDER_PRIORITY = [
    _DEFAULT => _DEFAULT,
    LOW => LOW,
    HIGH => HIGH,
];

const PRIORITY = ['DEFAULT' => 0, 'LOW' => 1, 'HIGH' => 2, 'EXTRA_HIGH' => 3];

const RETURN_TYPE = [0 => 'Not Refundable', 1 => 'Flat Rate Shipping', 2 => 'Returns paid by Store', 3 => 'Returns paid by Customer'];
const RETURN_TYPE_VAL = ['Not Refundable' => 0, 'Flat Rate Shipping' => 1, 'Returns paid by Store' => 2, 'Returns paid by Customer' => 3];

const ORDER_FULFILMENT_STATUS = ['Default', 'Canceled', 'Unfulfilled', 'PartlyFulfilled', 'Fulfilled'];
const ORDER_FULFILMENT_STATUS_REV = ['Default' => 0, 'Canceled' => 1, 'Unfulfilled' => 2, 'PartlyFulfilled' => 3, 'Fulfilled' => 4];

const ORDER_ITEM_FULFILMENT_STATUS = [0 => 'Unfulfilled', 3 => 'PartlyFulfilled', 4 => 'Fulfilled', 5 => 'Cancelled'];
const ORDER_ITEM_FULFILMENT_STATUS_BADGE = [0 => 'badge-secondary', 3 => 'badge-info', 4 => 'badge-success', 5 => 'badge-danger'];
const ORDER_ITEM_FULFILMENT_STATUS_REV = ['Unfulfilled' => 0, 'PartlyFulfilled' => 3, 'Fulfilled' => 4, 'Cancelled' => 5];

const AUS_POST_BASE_URL = 'https://digitalapi.auspost.com.au/';
const AUS_POST_BASE_SHIPPING_URL = 'https://digitalapi.auspost.com.au/test/shipping/v1/';
const AUS_POST_BASE_SHIPPING_URL_LIVE = 'https://digitalapi.auspost.com.au/shipping/v1/';

const SENDLE_BASE_URL ='https://sandbox.sendle.com/api/';
const SENDLE_BASE_URL_LIVE ='https://api.sendle.com/api/';

const VISA_CARD_LOGO = 'https://img.icons8.com/color/48/000000/visa.png';
const MASTER_CARD_LOGO = 'https://img.icons8.com/color/48/000000/mastercard-logo.png';

const DELIVERY = 0;
const BILLING = 1;

const STRIPE_STATUS = ['PENDING' => 0, 'SUCCESS' => 1, 'FAILED' => 2];

const EMPTY_ARRAY = [];

const ENCODE_ID_LENGTH = 120;

const PURCHASE_ORDER_UPLOAD_PATH = 'purchase-order-uploads';

const ZOOM_API_URL = 'https://api.zoom2u.com/api/v1/delivery/';
const Sherpa_API_URL = 'https://sherpa.test.com/api/v1/';
const MAIL_PLUS_URL = "https://uat-mp-papi.protechly.com";

const SHIPPING_ZONES = [
    'Domestic' => 'Domestic',
    'Rest of world' => 'Rest of world',
];

const MINUS = 'MINUS';
const PLUS = 'PLUS';

const WEEK_DAYS = [
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday',
];

#TODO These are plan ids in DB if you face any issue please update according to your DB
const PLAN = [
    'JUST_STARTED' => 1, // 4900 $49,
    'ECOMMERCE_BRAND' => 2, // 39900 $399,
    '3PL' => 3, //89900 $899
];

const VEHICLE_TYPES = ['bike', 'car', 'van'];

const SHIPMENT_CHARGED_BY = [
    'SYSTEM' => 'SYSTEM',
    'VENDOR' => 'VENDOR'
];

const SHIPPED_BY_DAY = [
    'Same Day' => 'same-day',
    'Next Business Day' => 'next-business-day',
    'Two Business Days' => 'two-business-day',
    'Three Business Days' => 'three-business-day'
];
