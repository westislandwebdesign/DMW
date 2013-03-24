@layout('layouts.default')

@section('content')

<div class="row">
    <div class="span5">
        <div class="Product_Image_Container">
            <img src="img/gtr_for_details.jpg">
        </div>
    </div>

    <div class="span6">
        <div class="Product_Info_Container">

            <ul>
                <li id="product_sku">GOD-24087</span></li>
                <li id="retail_price_label">Retail Price: &nbsp;<span id="retail_price_amount">$&nbsp;2315,00</span></li>
                <li id="dmw_price_label">Our Price: &nbsp;<span id="dmw_price_amount">$&nbsp;1799,99</span></li>
                <li id="yousave_label">You Save:</span>&nbsp;<span id="yousave_amount">$&nbsp;515,01&nbsp;(22.25 %)</li>
            </ul>

            <!--Add to Cart button and in/out stock status-->
            <div id="ctl00_ContentPlaceHolder1_cart">
                <input type="image" name="ctl00$ContentPlaceHolder1$btnAddToCart" id="ctl00_ContentPlaceHolder1_btnAddToCart" src="img/addtocart_en.gif" alt="Add To Cart" style="border-width:0px;">
                <div id="ctl00_ContentPlaceHolder1_pnlValidation">
                    <div id="ctl00_ContentPlaceHolder1_vsAttributes" class="validationSummary" style="color:Red;display:none;">

                    </div>
                </div>

                            <span id="ctl00_ContentPlaceHolder1_lblStockStatus">
                                <p><img src="img/instock.jpg" width="13" height="13"> This item is in stock.</p>
                            </span>
            </div>

            <!--Product Description-->
            <p class="product_description_short">
                The LGX-SA is a three-voice guitar featuring electric and acoustic guitar sounds,
                plus the infinite possibilities provided by synth access.
            </p>


            <!--Product Details-->
            <div class="product_description_details">
                <b>Details</b>
                <ul>
                    <li>
                        <p class="product_description_short">
                            The LGX-SA is a three-voice guitar featuring electric and acoustic guitar sounds,
                            <!--                                    plus the infinite possibilities provided by synth access. The output from the bridge-->
                            <!--                                    transducer system in the LGX-SA produces six separate signals—one for each string.-->
                            <!--                                    This divided signal is called hexaphonic and is used to drive guitar synths.-->
                            <!--                                    The LGX adapted itself to this application quite easily. However, in addition to the-->
                            <!--                                    electronic modifications, the guitar itself was altered in order to achieve the best-->
                            <!--                                    possible performance. The most visible difference between the standard LGX and the-->
                            <!--                                    LGX-SA is in the ebony fingerboard. The use of the ebony fingerboard improves synth-->
                            <!--                                    tracking. Guitar synth systems in the past were technically complicated and required-->
                            <!--                                    radical changes in playing technique. The LGX-SA/RolandTM GR-synth combination-->
                            <!--                                    represents a new standard in user friendliness and performance. This is truly a-->
                            <!--                                    'plug in and play' system.-->
                        </p>
                    </li>

                    <li>Neck
                        <ul>
                            <li>Mahogany neck</li>
                            <li>Ebony Fingerboard</li>
                            <li>16" fingerboard radius</li>
                            <li>25 1/2" Scale</li>
                            <li>1 11/16" nut width</li>
                        </ul>
                    </li>

                    <li>Mahogany body</li>

                    <li>Figured Maple Top</li>

                    <li>Electronics
                        <ul>
                            <li>Seymour Duncan Custom Humbuckers</li>
                            <li>5-Way switch</li>
                            <li>Guitar volume</li>
                            <li>Tone</li>
                            <li>Synth volume</li>
                        </ul>
                    </li>

                    <li>Program up/down</li>

                    <li>Outputs
                        <ul>
                            <li>Magnetic Output</li>
                            <li>13-pin Synth Output</li>
                            <li>Acoustic transducer Output</li>
                            <li>RMC transducer saddles with custom Pre-Amp EQ for: Acoustic Volume, Treble, Mid-Range and Bass controls</li>
                        </ul>
                    </li>

                    <li>Colors:
                        <ul>
                            <li>CognacBurst</li>
                            <li>Trans Blue</li>
                        </ul>
                    </li>

                    <li>Gig bag included</li>

            </div>
        </div>
    </div>
</div>

@endsection