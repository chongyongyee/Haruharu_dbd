@extends ('layouts.app')

@section('title','FAQs')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="bg-light">
    <div class="container ">
        <div class="row">
            <h4 class="mb-4 p-3">FAQs</h4>
            </div>

            <section class="faq-container">
                <h1 class="subtitle"> About the nails</h1>
                <div class="faq-one">
                    <!-- question -->
                    <h1 class="faq-page">Are the nails reusable?</h1>
                    <!-- answer -->
                    <div class="faq-body">
                        <p>
                            Even while press-on nails are lasting with proper maintenance, they can much be reused after removal, 
                            which is even better! Press-on nails can last up to two weeks with the correct nail glue. 
                            Additionally, if they remain in good condition after those two weeks, you may easily remove the excess 
                            adhesive and save them for later. The greatest press-on nails, however, are the only ones that can be reused.
                        </p>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-two">
                    <!-- question -->
                    <h1 class="faq-page">What comes with my nail purchase?</h1>
                    <!-- answer -->
                    <div class="faq-body">
                        <ul>
                            <li>Press On Nails</li>
                            <li>Nail File</li>
                            <li>Alcohol Wipes x2</li>
                            <li>Adhesive tabs x1pc or Nail Glue x1</li>
                            <li>Wooden Stick</li>
                        </ul>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-three">
                    <!-- question -->
                    <h1 class="faq-page">How to wear/apply Press On Nails?</h1>
                    <!-- answer -->
                    <div class="faq-body">                    
                        <ul>
                            <li>Cut away excess grown nails, keep your nails short before using the Press On Nails</li>
                            <li>Use the nail file to file down your natural nail</li>
                            <li>Gently buff the surface to remove the shine surface</li>
                            <li>Use the alcohol wipe to wipe over your nails to remove any dust or oil</li>
                            <li>Stick the Press On Nails using the adhesive tab or nail glue</li>                        
                        </ul>                  
                        
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-four">
                    <!-- question -->
                    <h1 class="faq-page">How to remove Press On Nails?</h1>
                    <!-- answer -->
                    <div class="faq-body">
                        <ul>
                            <li>If you're using adhesive tabs, soak your nails in warm water for 5 minutes | If you're using nail
                                glue, soak your nails in warm water for 10-15 minutes
                            </li>
                            <li>Remove yur fingers from water, carefully go underneath the sidewalls and genlt push towards the middle
                                until they pop off
                            </li>
                        </ul>                  
                        
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-five">
                    <!-- question -->
                    <h1 class="faq-page">What type of adhesive should I use?</h1>
                    <!-- answer -->
                    <div class="faq-body">
                        <h5> 2 ways to choose</h5>
                        <br>
                        <ul>
                            <h6>1. Nail Glue</h6>
                            <li>Last up for 2-4 weeks (Depends on how you take care)</li>
                            <li>Not re-wearable</li>
                            <li>Waterproof</li>
                            <br>

                            <h6>2. Adhesive Tab</h6>
                            <li>Last for 1-2 weeks (Depends on how you take care)</li>
                            <li>Perfect for short term use</li>
                            <li>Re-wearable</li>
                            <li>Waterproof</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="faq-container">
                <h1 class="subtitle"> Shipping & Returns</h1>  
                <div class="faq-one">
                    <!-- question -->
                    <h1 class="faq-page">What's your shipping time?</h1>
                    <!-- answer -->
                    <div class="faq-body">
                        <p><strong> Shipping: 3-7 business days</p></strong>
                        
                        <br>
                        <p>
                            It tooks around a week to receive your Press On Nails. After we checked through the payment proof, we
                            will start making your order and ship it out as soon as posible.
                        </p>
                        <br>
                        <p> *Note* All orders will be shipped on Monday to Friday. Unfortunately, we cannot process orders on weekends. 
                            Orders placed on Saturday or Sunday will ship out on Monday that follows.
                        </p>
                        <br>
                        <p><strong>We sincerely apologize for the inconvenience but at this time, we are not able to ship internationally.</p></strong> 
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-two">
                    <!-- question -->
                    <h1 class="faq-page">Cancellations & return?</h1>
                    <!-- answer -->
                    <div class="faq-body">
                        <p>Sorry, we do not accept any cancellation and return. Kindly make sure the order and information provided are correct. </p>
                        <p style="font-weight: bold;">-Goods sold are not refundable</p>
                    </div>
                </div>

            </section>

            <section class="faq-container">
                <h1 class="subtitle"> Sizing Chart</h1>
                <div class="faq-one">
                    <!-- question -->
                    <h1 class="faq-page">How to measure your size?</h1>
                    <!-- answer -->
                    <div class="faq-body">
                        <ul type="1">
                            <li>Apply measuring tape or paper horizontally across the widest parts of your natural nails</li>
                            <li>Mark down each fingers measurement and choose the size</li>
                        </ul>
                        <p>+-0.2cm are normally within the comfortable range(acceptable)</p>
                        <br>
                        <img src="{{ URL::to('/assets/img/IMG_7818.jpg') }}" alt="measurement" width="550" height="320">
                    </div>
                </div>
                <hr class="hr-line">
                <div class="faq-two">
                    <!-- question -->
                    <h1 class="faq-page">Size Chart</h1>
                    <!-- answer -->
                    <div class="faq-body">
                        <table>
                            <tr>
                            <th>Size</th>
                            <th>Thumb</th>
                            <th>Index</th>
                            <th>Middle</th>
                            <th>Ring</th>
                            <th>Pinky</th>
                            </tr>
                            <tr>
                            <td>S</td>
                            <td>1.5</td>
                            <td>1.1</td>
                            <td>1.2</td>
                            <td>1.1</td>
                            <td>0.9</td>
                            </tr>
                            <tr>
                                <td>M</td>
                                <td>1.6</td>
                                <td>1.2</td>
                                <td>1.3</td>
                                <td>1.2</td>
                                <td>1.0</td>
                            </tr>
                        </table>
                        <br>
                        <p> Choose the size based on the measurement you got from measurement guide</p>
                        <br>
                        <p>+-0.2cm are normally within the comfortable range(acceptable)</p>
                    </div>
                </div>

            </section>

        
            <script src="{{ asset('assets/js/faqs.js') }}"></script>
        
        </main>
    </div>
</div>
    
    

@endsection