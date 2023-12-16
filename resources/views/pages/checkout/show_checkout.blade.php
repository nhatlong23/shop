@extends('welcome')
@section('content')
    <!--Body Container-->
    <div id="page-content">
        <!--Collection Banner-->
        <div class="collection-header">
            <div class="collection-hero">
                <div class="collection-hero__image"></div>
                <div class="collection-hero__title-wrapper container">
                    <h1 class="collection-hero__title">Thanh Toán</h1>
                    <div class="breadcrumbs text-uppercase mt-1 mt-lg-2"><a href="{{ asset('home') }}"
                            title="Back to the home page">Trang chủ</a><span>|</span><span class="fw-bold">Thanh Toán</span>
                    </div>
                </div>
            </div>
        </div>
        <!--End Collection Banner-->

        <!--Main Content-->
        <div class="container">
            <form class="checkout-form" method="post" action="#">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card card--grey">
                            <div class="card-body">
                                <h2 class="fs-6">Địa chỉ giao hàng</h2>
                                {{-- <p><a class="text-decoration-underline" href="login.html">Login</a> or <a
                                        class="text-decoration-underline" href="register.html">Register</a> for faster
                                    payment.</p> --}}
                                <div class="row mt-2">
                                    <div class="col-sm-6"><label class="text-uppercase d-none">Tên:</label>
                                        <div class="form-group">
                                            <input type="text" name="shipping_name" placeholder="Tên" class="form-control shipping_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6"><label class="text-uppercase d-none">Số điện thoại:</label>
                                        <div class="form-group">
                                            <input type="text" name="shipping_phone" placeholder="SĐT" class="form-control shipping_phone">
                                        </div>
                                    </div>
                                </div>
                                <label class="text-uppercase d-none">Email:</label>
                                <div class="form-group">
                                    <input type="email" name="shipping_email" placeholder="Nhập Email" class="form-control shipping_email">
                                </div>
                                {{-- <label class="text-uppercase d-none">Country:</label>
                                <div class="form-group select-wrapper">
                                    <select id="address_country" name="address[country]" data-default="United States">
                                        <option value="0" label="Select a country" selected="selected">Select a country
                                        </option>
                                        <optgroup id="country-optgroup-Africa" label="Africa">
                                            <option value="DZ" label="Algeria">Algeria</option>
                                            <option value="AO" label="Angola">Angola</option>
                                            <option value="BJ" label="Benin">Benin</option>
                                            <option value="BW" label="Botswana">Botswana</option>
                                            <option value="BF" label="Burkina Faso">Burkina Faso</option>
                                            <option value="BI" label="Burundi">Burundi</option>
                                            <option value="CM" label="Cameroon">Cameroon</option>
                                            <option value="CV" label="Cape Verde">Cape Verde</option>
                                            <option value="CF" label="Central African Republic">Central African Republic
                                            </option>
                                            <option value="TD" label="Chad">Chad</option>
                                            <option value="KM" label="Comoros">Comoros</option>
                                            <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                                            <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                                            <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                                            <option value="DJ" label="Djibouti">Djibouti</option>
                                            <option value="EG" label="Egypt">Egypt</option>
                                            <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="ER" label="Eritrea">Eritrea</option>
                                            <option value="ET" label="Ethiopia">Ethiopia</option>
                                            <option value="GA" label="Gabon">Gabon</option>
                                            <option value="GM" label="Gambia">Gambia</option>
                                            <option value="GH" label="Ghana">Ghana</option>
                                            <option value="GN" label="Guinea">Guinea</option>
                                            <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="KE" label="Kenya">Kenya</option>
                                            <option value="LS" label="Lesotho">Lesotho</option>
                                            <option value="LR" label="Liberia">Liberia</option>
                                            <option value="LY" label="Libya">Libya</option>
                                            <option value="MG" label="Madagascar">Madagascar</option>
                                            <option value="MW" label="Malawi">Malawi</option>
                                            <option value="ML" label="Mali">Mali</option>
                                            <option value="MR" label="Mauritania">Mauritania</option>
                                            <option value="MU" label="Mauritius">Mauritius</option>
                                            <option value="YT" label="Mayotte">Mayotte</option>
                                            <option value="MA" label="Morocco">Morocco</option>
                                            <option value="MZ" label="Mozambique">Mozambique</option>
                                            <option value="NA" label="Namibia">Namibia</option>
                                            <option value="NE" label="Niger">Niger</option>
                                            <option value="NG" label="Nigeria">Nigeria</option>
                                            <option value="RW" label="Rwanda">Rwanda</option>
                                            <option value="RE" label="Réunion">Réunion</option>
                                            <option value="SH" label="Saint Helena">Saint Helena</option>
                                            <option value="SN" label="Senegal">Senegal</option>
                                            <option value="SC" label="Seychelles">Seychelles</option>
                                            <option value="SL" label="Sierra Leone">Sierra Leone</option>
                                            <option value="SO" label="Somalia">Somalia</option>
                                            <option value="ZA" label="South Africa">South Africa</option>
                                            <option value="SD" label="Sudan">Sudan</option>
                                            <option value="SZ" label="Swaziland">Swaziland</option>
                                            <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe
                                            </option>
                                            <option value="TZ" label="Tanzania">Tanzania</option>
                                            <option value="TG" label="Togo">Togo</option>
                                            <option value="TN" label="Tunisia">Tunisia</option>
                                            <option value="UG" label="Uganda">Uganda</option>
                                            <option value="EH" label="Western Sahara">Western Sahara</option>
                                            <option value="ZM" label="Zambia">Zambia</option>
                                            <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                                        </optgroup>
                                        <optgroup id="country-optgroup-Americas" label="Americas">
                                            <option value="AI" label="Anguilla">Anguilla</option>
                                            <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda
                                            </option>
                                            <option value="AR" label="Argentina">Argentina</option>
                                            <option value="AW" label="Aruba">Aruba</option>
                                            <option value="BS" label="Bahamas">Bahamas</option>
                                            <option value="BB" label="Barbados">Barbados</option>
                                            <option value="BZ" label="Belize">Belize</option>
                                            <option value="BM" label="Bermuda">Bermuda</option>
                                            <option value="BO" label="Bolivia">Bolivia</option>
                                            <option value="BR" label="Brazil">Brazil</option>
                                            <option value="VG" label="British Virgin Islands">British Virgin Islands
                                            </option>
                                            <option value="CA" label="Canada">Canada</option>
                                            <option value="KY" label="Cayman Islands">Cayman Islands</option>
                                            <option value="CL" label="Chile">Chile</option>
                                            <option value="CO" label="Colombia">Colombia</option>
                                            <option value="CR" label="Costa Rica">Costa Rica</option>
                                            <option value="CU" label="Cuba">Cuba</option>
                                            <option value="DM" label="Dominica">Dominica</option>
                                            <option value="DO" label="Dominican Republic">Dominican Republic</option>
                                            <option value="EC" label="Ecuador">Ecuador</option>
                                            <option value="SV" label="El Salvador">El Salvador</option>
                                            <option value="FK" label="Falkland Islands">Falkland Islands</option>
                                            <option value="GF" label="French Guiana">French Guiana</option>
                                            <option value="GL" label="Greenland">Greenland</option>
                                            <option value="GD" label="Grenada">Grenada</option>
                                            <option value="GP" label="Guadeloupe">Guadeloupe</option>
                                            <option value="GT" label="Guatemala">Guatemala</option>
                                            <option value="GY" label="Guyana">Guyana</option>
                                            <option value="HT" label="Haiti">Haiti</option>
                                            <option value="HN" label="Honduras">Honduras</option>
                                            <option value="JM" label="Jamaica">Jamaica</option>
                                            <option value="MQ" label="Martinique">Martinique</option>
                                            <option value="MX" label="Mexico">Mexico</option>
                                            <option value="MS" label="Montserrat">Montserrat</option>
                                            <option value="AN" label="Netherlands Antilles">Netherlands Antilles
                                            </option>
                                            <option value="NI" label="Nicaragua">Nicaragua</option>
                                            <option value="PA" label="Panama">Panama</option>
                                            <option value="PY" label="Paraguay">Paraguay</option>
                                            <option value="PE" label="Peru">Peru</option>
                                            <option value="PR" label="Puerto Rico">Puerto Rico</option>
                                            <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                                            <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis
                                            </option>
                                            <option value="LC" label="Saint Lucia">Saint Lucia</option>
                                            <option value="MF" label="Saint Martin">Saint Martin</option>
                                            <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and
                                                Miquelon</option>
                                            <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent
                                                and the Grenadines</option>
                                            <option value="SR" label="Suriname">Suriname</option>
                                            <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago
                                            </option>
                                            <option value="TC" label="Turks and Caicos Islands">Turks and Caicos
                                                Islands</option>
                                            <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands
                                            </option>
                                            <option value="US" label="United States">United States</option>
                                            <option value="UY" label="Uruguay">Uruguay</option>
                                            <option value="VE" label="Venezuela">Venezuela</option>
                                        </optgroup>
                                        <optgroup id="country-optgroup-Asia" label="Asia">
                                            <option value="AF" label="Afghanistan">Afghanistan</option>
                                            <option value="AM" label="Armenia">Armenia</option>
                                            <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                                            <option value="BH" label="Bahrain">Bahrain</option>
                                            <option value="BD" label="Bangladesh">Bangladesh</option>
                                            <option value="BT" label="Bhutan">Bhutan</option>
                                            <option value="BN" label="Brunei">Brunei</option>
                                            <option value="KH" label="Cambodia">Cambodia</option>
                                            <option value="CN" label="China">China</option>
                                            <option value="GE" label="Georgia">Georgia</option>
                                            <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China
                                            </option>
                                            <option value="IN" label="India">India</option>
                                            <option value="ID" label="Indonesia">Indonesia</option>
                                            <option value="IR" label="Iran">Iran</option>
                                            <option value="IQ" label="Iraq">Iraq</option>
                                            <option value="IL" label="Israel">Israel</option>
                                            <option value="JP" label="Japan">Japan</option>
                                            <option value="JO" label="Jordan">Jordan</option>
                                            <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                                            <option value="KW" label="Kuwait">Kuwait</option>
                                            <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="LA" label="Laos">Laos</option>
                                            <option value="LB" label="Lebanon">Lebanon</option>
                                            <option value="MO" label="Macau SAR China">Macau SAR China</option>
                                            <option value="MY" label="Malaysia">Malaysia</option>
                                            <option value="MV" label="Maldives">Maldives</option>
                                            <option value="MN" label="Mongolia">Mongolia</option>
                                            <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                                            <option value="NP" label="Nepal">Nepal</option>
                                            <option value="NT" label="Neutral Zone">Neutral Zone</option>
                                            <option value="KP" label="North Korea">North Korea</option>
                                            <option value="OM" label="Oman">Oman</option>
                                            <option value="PK" label="Pakistan">Pakistan</option>
                                            <option value="PS" label="Palestinian Territories">Palestinian Territories
                                            </option>
                                            <option value="YD" label="People's Democratic Republic of Yemen">People's
                                                Democratic Republic of Yemen</option>
                                            <option value="PH" label="Philippines">Philippines</option>
                                            <option value="QA" label="Qatar">Qatar</option>
                                            <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                                            <option value="SG" label="Singapore">Singapore</option>
                                            <option value="KR" label="South Korea">South Korea</option>
                                            <option value="LK" label="Sri Lanka">Sri Lanka</option>
                                            <option value="SY" label="Syria">Syria</option>
                                            <option value="TW" label="Taiwan">Taiwan</option>
                                            <option value="TJ" label="Tajikistan">Tajikistan</option>
                                            <option value="TH" label="Thailand">Thailand</option>
                                            <option value="TL" label="Timor-Leste">Timor-Leste</option>
                                            <option value="TR" label="Turkey">Turkey</option>
                                            <option value="TM" label="Turkmenistan">Turkmenistan</option>
                                            <option value="AE" label="United Arab Emirates">United Arab Emirates
                                            </option>
                                            <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                                            <option value="VN" label="Vietnam">Vietnam</option>
                                            <option value="YE" label="Yemen">Yemen</option>
                                        </optgroup>
                                        <optgroup id="country-optgroup-Europe" label="Europe">
                                            <option value="AL" label="Albania">Albania</option>
                                            <option value="AD" label="Andorra">Andorra</option>
                                            <option value="AT" label="Austria">Austria</option>
                                            <option value="BY" label="Belarus">Belarus</option>
                                            <option value="BE" label="Belgium">Belgium</option>
                                            <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina
                                            </option>
                                            <option value="BG" label="Bulgaria">Bulgaria</option>
                                            <option value="HR" label="Croatia">Croatia</option>
                                            <option value="CY" label="Cyprus">Cyprus</option>
                                            <option value="CZ" label="Czech Republic">Czech Republic</option>
                                            <option value="DK" label="Denmark">Denmark</option>
                                            <option value="DD" label="East Germany">East Germany</option>
                                            <option value="EE" label="Estonia">Estonia</option>
                                            <option value="FO" label="Faroe Islands">Faroe Islands</option>
                                            <option value="FI" label="Finland">Finland</option>
                                            <option value="FR" label="France">France</option>
                                            <option value="DE" label="Germany">Germany</option>
                                            <option value="GI" label="Gibraltar">Gibraltar</option>
                                            <option value="GR" label="Greece">Greece</option>
                                            <option value="GG" label="Guernsey">Guernsey</option>
                                            <option value="HU" label="Hungary">Hungary</option>
                                            <option value="IS" label="Iceland">Iceland</option>
                                            <option value="IE" label="Ireland">Ireland</option>
                                            <option value="IM" label="Isle of Man">Isle of Man</option>
                                            <option value="IT" label="Italy">Italy</option>
                                            <option value="JE" label="Jersey">Jersey</option>
                                            <option value="LV" label="Latvia">Latvia</option>
                                            <option value="LI" label="Liechtenstein">Liechtenstein</option>
                                            <option value="LT" label="Lithuania">Lithuania</option>
                                            <option value="LU" label="Luxembourg">Luxembourg</option>
                                            <option value="MK" label="Macedonia">Macedonia</option>
                                            <option value="MT" label="Malta">Malta</option>
                                            <option value="FX" label="Metropolitan France">Metropolitan France
                                            </option>
                                            <option value="MD" label="Moldova">Moldova</option>
                                            <option value="MC" label="Monaco">Monaco</option>
                                            <option value="ME" label="Montenegro">Montenegro</option>
                                            <option value="NL" label="Netherlands">Netherlands</option>
                                            <option value="NO" label="Norway">Norway</option>
                                            <option value="PL" label="Poland">Poland</option>
                                            <option value="PT" label="Portugal">Portugal</option>
                                            <option value="RO" label="Romania">Romania</option>
                                            <option value="RU" label="Russia">Russia</option>
                                            <option value="SM" label="San Marino">San Marino</option>
                                            <option value="RS" label="Serbia">Serbia</option>
                                            <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro
                                            </option>
                                            <option value="SK" label="Slovakia">Slovakia</option>
                                            <option value="SI" label="Slovenia">Slovenia</option>
                                            <option value="ES" label="Spain">Spain</option>
                                            <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                            </option>
                                            <option value="SE" label="Sweden">Sweden</option>
                                            <option value="CH" label="Switzerland">Switzerland</option>
                                            <option value="UA" label="Ukraine">Ukraine</option>
                                            <option value="SU" label="Union of Soviet Socialist Republics">Union of
                                                Soviet Socialist Republics</option>
                                            <option value="GB" label="United Kingdom">United Kingdom</option>
                                            <option value="VA" label="Vatican City">Vatican City</option>
                                            <option value="AX" label="Åland Islands">Åland Islands</option>
                                        </optgroup>
                                        <optgroup id="country-optgroup-Oceania" label="Oceania">
                                            <option value="AS" label="American Samoa">American Samoa</option>
                                            <option value="AQ" label="Antarctica">Antarctica</option>
                                            <option value="AU" label="Australia">Australia</option>
                                            <option value="BV" label="Bouvet Island">Bouvet Island</option>
                                            <option value="IO" label="British Indian Ocean Territory">British Indian
                                                Ocean Territory</option>
                                            <option value="CX" label="Christmas Island">Christmas Island</option>
                                            <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands
                                            </option>
                                            <option value="CK" label="Cook Islands">Cook Islands</option>
                                            <option value="FJ" label="Fiji">Fiji</option>
                                            <option value="PF" label="French Polynesia">French Polynesia</option>
                                            <option value="TF" label="French Southern Territories">French Southern
                                                Territories</option>
                                            <option value="GU" label="Guam">Guam</option>
                                            <option value="HM" label="Heard Island and McDonald Islands">Heard Island
                                                and McDonald Islands</option>
                                            <option value="KI" label="Kiribati">Kiribati</option>
                                            <option value="MH" label="Marshall Islands">Marshall Islands</option>
                                            <option value="FM" label="Micronesia">Micronesia</option>
                                            <option value="NR" label="Nauru">Nauru</option>
                                            <option value="NC" label="New Caledonia">New Caledonia</option>
                                            <option value="NZ" label="New Zealand">New Zealand</option>
                                            <option value="NU" label="Niue">Niue</option>
                                            <option value="NF" label="Norfolk Island">Norfolk Island</option>
                                            <option value="MP" label="Northern Mariana Islands">Northern Mariana
                                                Islands</option>
                                            <option value="PW" label="Palau">Palau</option>
                                            <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                                            <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                                            <option value="WS" label="Samoa">Samoa</option>
                                            <option value="SB" label="Solomon Islands">Solomon Islands</option>
                                            <option value="GS" label="South Georgia and the South Sandwich Islands">
                                                South Georgia and the South Sandwich Islands</option>
                                            <option value="TK" label="Tokelau">Tokelau</option>
                                            <option value="TO" label="Tonga">Tonga</option>
                                            <option value="TV" label="Tuvalu">Tuvalu</option>
                                            <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying
                                                Islands</option>
                                            <option value="VU" label="Vanuatu">Vanuatu</option>
                                            <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6"><label class="text-uppercase d-none">State:</label>
                                        <div class="form-group select-wrapper">
                                            <select id="address_province" name="address[province]" data-default="">
                                                <option value="0" label="Select a state" selected="selected">Select
                                                    a state</option>
                                                <option value="AL">Alabama</option>
                                                <option value="AK">Alaska</option>
                                                <option value="AZ">Arizona</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="CA">California</option>
                                                <option value="CO">Colorado</option>
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="DC">District Of Columbia</option>
                                                <option value="FL">Florida</option>
                                                <option value="GA">Georgia</option>
                                                <option value="HI">Hawaii</option>
                                                <option value="ID">Idaho</option>
                                                <option value="IL">Illinois</option>
                                                <option value="IN">Indiana</option>
                                                <option value="IA">Iowa</option>
                                                <option value="KS">Kansas</option>
                                                <option value="KY">Kentucky</option>
                                                <option value="LA">Louisiana</option>
                                                <option value="ME">Maine</option>
                                                <option value="MD">Maryland</option>
                                                <option value="MA">Massachusetts</option>
                                                <option value="MI">Michigan</option>
                                                <option value="MN">Minnesota</option>
                                                <option value="MS">Mississippi</option>
                                                <option value="MO">Missouri</option>
                                                <option value="MT">Montana</option>
                                                <option value="NE">Nebraska</option>
                                                <option value="NV">Nevada</option>
                                                <option value="NH">New Hampshire</option>
                                                <option value="NJ">New Jersey</option>
                                                <option value="NM">New Mexico</option>
                                                <option value="NY">New York</option>
                                                <option value="NC">North Carolina</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="OH">Ohio</option>
                                                <option value="OK">Oklahoma</option>
                                                <option value="OR">Oregon</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="SD">South Dakota</option>
                                                <option value="TN">Tennessee</option>
                                                <option value="TX">Texas</option>
                                                <option value="UT">Utah</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WA">Washington</option>
                                                <option value="WV">West Virginia</option>
                                                <option value="WI">Wisconsin</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"><label class="text-uppercase d-none">Zip/postal code:</label>
                                        <div class="form-group"><input type="text" placeholder="Zip/postal code"
                                                class="form-control"></div>
                                    </div>
                                </div> --}}
                                <label class="text-uppercase d-none">Địa chỉ :</label>
                                <div class="form-group">
                                    <input type="text" placeholder="Địa chỉ" name="shipping_address" class="form-control shipping_phone">
                                    </div>
                                {{-- <label class="text-uppercase d-none">Address 2:</label>
                                <div class="form-group"><input type="text" placeholder="Address 2"
                                        class="form-control"></div>
                                <div class="customCheckbox clearfix">
                                    <input id="formcheckoutCheckbox1" name="checkbox1" type="checkbox" />
                                    <label for="formcheckoutCheckbox1">Save address to my account</label>
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="card card--grey mt-2">
                            <div class="card-body">
                                <h2 class="fs-6">BILLING ADDRESS</h2>
                                <div class="customCheckbox clearfix py-2 my-2">
                                    <input id="formcheckoutCheckbox2" name="checkbox2" type="checkbox">
                                    <label for="formcheckoutCheckbox2">The same as shipping address</label>
                                </div>
                                <label class="text-uppercase d-none">Country:</label>
                                <div class="form-group select-wrapper">
                                    <select id="address_country2" name="address[country]" data-default="United States">
                                        <option value="0" label="Select a country" selected="selected">Select a
                                            country</option>
                                        <optgroup id="country-optgroup-Africa2" label="Africa">
                                            <option value="DZ" label="Algeria">Algeria</option>
                                            <option value="AO" label="Angola">Angola</option>
                                            <option value="BJ" label="Benin">Benin</option>
                                            <option value="BW" label="Botswana">Botswana</option>
                                            <option value="BF" label="Burkina Faso">Burkina Faso</option>
                                            <option value="BI" label="Burundi">Burundi</option>
                                            <option value="CM" label="Cameroon">Cameroon</option>
                                            <option value="CV" label="Cape Verde">Cape Verde</option>
                                            <option value="CF" label="Central African Republic">Central African
                                                Republic</option>
                                            <option value="TD" label="Chad">Chad</option>
                                            <option value="KM" label="Comoros">Comoros</option>
                                            <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville
                                            </option>
                                            <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                                            <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                                            <option value="DJ" label="Djibouti">Djibouti</option>
                                            <option value="EG" label="Egypt">Egypt</option>
                                            <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="ER" label="Eritrea">Eritrea</option>
                                            <option value="ET" label="Ethiopia">Ethiopia</option>
                                            <option value="GA" label="Gabon">Gabon</option>
                                            <option value="GM" label="Gambia">Gambia</option>
                                            <option value="GH" label="Ghana">Ghana</option>
                                            <option value="GN" label="Guinea">Guinea</option>
                                            <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="KE" label="Kenya">Kenya</option>
                                            <option value="LS" label="Lesotho">Lesotho</option>
                                            <option value="LR" label="Liberia">Liberia</option>
                                            <option value="LY" label="Libya">Libya</option>
                                            <option value="MG" label="Madagascar">Madagascar</option>
                                            <option value="MW" label="Malawi">Malawi</option>
                                            <option value="ML" label="Mali">Mali</option>
                                            <option value="MR" label="Mauritania">Mauritania</option>
                                            <option value="MU" label="Mauritius">Mauritius</option>
                                            <option value="YT" label="Mayotte">Mayotte</option>
                                            <option value="MA" label="Morocco">Morocco</option>
                                            <option value="MZ" label="Mozambique">Mozambique</option>
                                            <option value="NA" label="Namibia">Namibia</option>
                                            <option value="NE" label="Niger">Niger</option>
                                            <option value="NG" label="Nigeria">Nigeria</option>
                                            <option value="RW" label="Rwanda">Rwanda</option>
                                            <option value="RE" label="Réunion">Réunion</option>
                                            <option value="SH" label="Saint Helena">Saint Helena</option>
                                            <option value="SN" label="Senegal">Senegal</option>
                                            <option value="SC" label="Seychelles">Seychelles</option>
                                            <option value="SL" label="Sierra Leone">Sierra Leone</option>
                                            <option value="SO" label="Somalia">Somalia</option>
                                            <option value="ZA" label="South Africa">South Africa</option>
                                            <option value="SD" label="Sudan">Sudan</option>
                                            <option value="SZ" label="Swaziland">Swaziland</option>
                                            <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe
                                            </option>
                                            <option value="TZ" label="Tanzania">Tanzania</option>
                                            <option value="TG" label="Togo">Togo</option>
                                            <option value="TN" label="Tunisia">Tunisia</option>
                                            <option value="UG" label="Uganda">Uganda</option>
                                            <option value="EH" label="Western Sahara">Western Sahara</option>
                                            <option value="ZM" label="Zambia">Zambia</option>
                                            <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                                        </optgroup>
                                        <optgroup id="country-optgroup-Americas2" label="Americas">
                                            <option value="AI" label="Anguilla">Anguilla</option>
                                            <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda
                                            </option>
                                            <option value="AR" label="Argentina">Argentina</option>
                                            <option value="AW" label="Aruba">Aruba</option>
                                            <option value="BS" label="Bahamas">Bahamas</option>
                                            <option value="BB" label="Barbados">Barbados</option>
                                            <option value="BZ" label="Belize">Belize</option>
                                            <option value="BM" label="Bermuda">Bermuda</option>
                                            <option value="BO" label="Bolivia">Bolivia</option>
                                            <option value="BR" label="Brazil">Brazil</option>
                                            <option value="VG" label="British Virgin Islands">British Virgin Islands
                                            </option>
                                            <option value="CA" label="Canada">Canada</option>
                                            <option value="KY" label="Cayman Islands">Cayman Islands</option>
                                            <option value="CL" label="Chile">Chile</option>
                                            <option value="CO" label="Colombia">Colombia</option>
                                            <option value="CR" label="Costa Rica">Costa Rica</option>
                                            <option value="CU" label="Cuba">Cuba</option>
                                            <option value="DM" label="Dominica">Dominica</option>
                                            <option value="DO" label="Dominican Republic">Dominican Republic</option>
                                            <option value="EC" label="Ecuador">Ecuador</option>
                                            <option value="SV" label="El Salvador">El Salvador</option>
                                            <option value="FK" label="Falkland Islands">Falkland Islands</option>
                                            <option value="GF" label="French Guiana">French Guiana</option>
                                            <option value="GL" label="Greenland">Greenland</option>
                                            <option value="GD" label="Grenada">Grenada</option>
                                            <option value="GP" label="Guadeloupe">Guadeloupe</option>
                                            <option value="GT" label="Guatemala">Guatemala</option>
                                            <option value="GY" label="Guyana">Guyana</option>
                                            <option value="HT" label="Haiti">Haiti</option>
                                            <option value="HN" label="Honduras">Honduras</option>
                                            <option value="JM" label="Jamaica">Jamaica</option>
                                            <option value="MQ" label="Martinique">Martinique</option>
                                            <option value="MX" label="Mexico">Mexico</option>
                                            <option value="MS" label="Montserrat">Montserrat</option>
                                            <option value="AN" label="Netherlands Antilles">Netherlands Antilles
                                            </option>
                                            <option value="NI" label="Nicaragua">Nicaragua</option>
                                            <option value="PA" label="Panama">Panama</option>
                                            <option value="PY" label="Paraguay">Paraguay</option>
                                            <option value="PE" label="Peru">Peru</option>
                                            <option value="PR" label="Puerto Rico">Puerto Rico</option>
                                            <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                                            <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis
                                            </option>
                                            <option value="LC" label="Saint Lucia">Saint Lucia</option>
                                            <option value="MF" label="Saint Martin">Saint Martin</option>
                                            <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and
                                                Miquelon</option>
                                            <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent
                                                and the Grenadines</option>
                                            <option value="SR" label="Suriname">Suriname</option>
                                            <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago
                                            </option>
                                            <option value="TC" label="Turks and Caicos Islands">Turks and Caicos
                                                Islands</option>
                                            <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands
                                            </option>
                                            <option value="US" label="United States">United States</option>
                                            <option value="UY" label="Uruguay">Uruguay</option>
                                            <option value="VE" label="Venezuela">Venezuela</option>
                                        </optgroup>
                                        <optgroup id="country-optgroup-Asia2" label="Asia">
                                            <option value="AF" label="Afghanistan">Afghanistan</option>
                                            <option value="AM" label="Armenia">Armenia</option>
                                            <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                                            <option value="BH" label="Bahrain">Bahrain</option>
                                            <option value="BD" label="Bangladesh">Bangladesh</option>
                                            <option value="BT" label="Bhutan">Bhutan</option>
                                            <option value="BN" label="Brunei">Brunei</option>
                                            <option value="KH" label="Cambodia">Cambodia</option>
                                            <option value="CN" label="China">China</option>
                                            <option value="GE" label="Georgia">Georgia</option>
                                            <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China
                                            </option>
                                            <option value="IN" label="India">India</option>
                                            <option value="ID" label="Indonesia">Indonesia</option>
                                            <option value="IR" label="Iran">Iran</option>
                                            <option value="IQ" label="Iraq">Iraq</option>
                                            <option value="IL" label="Israel">Israel</option>
                                            <option value="JP" label="Japan">Japan</option>
                                            <option value="JO" label="Jordan">Jordan</option>
                                            <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                                            <option value="KW" label="Kuwait">Kuwait</option>
                                            <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="LA" label="Laos">Laos</option>
                                            <option value="LB" label="Lebanon">Lebanon</option>
                                            <option value="MO" label="Macau SAR China">Macau SAR China</option>
                                            <option value="MY" label="Malaysia">Malaysia</option>
                                            <option value="MV" label="Maldives">Maldives</option>
                                            <option value="MN" label="Mongolia">Mongolia</option>
                                            <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                                            <option value="NP" label="Nepal">Nepal</option>
                                            <option value="NT" label="Neutral Zone">Neutral Zone</option>
                                            <option value="KP" label="North Korea">North Korea</option>
                                            <option value="OM" label="Oman">Oman</option>
                                            <option value="PK" label="Pakistan">Pakistan</option>
                                            <option value="PS" label="Palestinian Territories">Palestinian Territories
                                            </option>
                                            <option value="YD" label="People's Democratic Republic of Yemen">People's
                                                Democratic Republic of Yemen</option>
                                            <option value="PH" label="Philippines">Philippines</option>
                                            <option value="QA" label="Qatar">Qatar</option>
                                            <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                                            <option value="SG" label="Singapore">Singapore</option>
                                            <option value="KR" label="South Korea">South Korea</option>
                                            <option value="LK" label="Sri Lanka">Sri Lanka</option>
                                            <option value="SY" label="Syria">Syria</option>
                                            <option value="TW" label="Taiwan">Taiwan</option>
                                            <option value="TJ" label="Tajikistan">Tajikistan</option>
                                            <option value="TH" label="Thailand">Thailand</option>
                                            <option value="TL" label="Timor-Leste">Timor-Leste</option>
                                            <option value="TR" label="Turkey">Turkey</option>
                                            <option value="TM" label="Turkmenistan">Turkmenistan</option>
                                            <option value="AE" label="United Arab Emirates">United Arab Emirates
                                            </option>
                                            <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                                            <option value="VN" label="Vietnam">Vietnam</option>
                                            <option value="YE" label="Yemen">Yemen</option>
                                        </optgroup>
                                        <optgroup id="country-optgroup-Europe2" label="Europe">
                                            <option value="AL" label="Albania">Albania</option>
                                            <option value="AD" label="Andorra">Andorra</option>
                                            <option value="AT" label="Austria">Austria</option>
                                            <option value="BY" label="Belarus">Belarus</option>
                                            <option value="BE" label="Belgium">Belgium</option>
                                            <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina
                                            </option>
                                            <option value="BG" label="Bulgaria">Bulgaria</option>
                                            <option value="HR" label="Croatia">Croatia</option>
                                            <option value="CY" label="Cyprus">Cyprus</option>
                                            <option value="CZ" label="Czech Republic">Czech Republic</option>
                                            <option value="DK" label="Denmark">Denmark</option>
                                            <option value="DD" label="East Germany">East Germany</option>
                                            <option value="EE" label="Estonia">Estonia</option>
                                            <option value="FO" label="Faroe Islands">Faroe Islands</option>
                                            <option value="FI" label="Finland">Finland</option>
                                            <option value="FR" label="France">France</option>
                                            <option value="DE" label="Germany">Germany</option>
                                            <option value="GI" label="Gibraltar">Gibraltar</option>
                                            <option value="GR" label="Greece">Greece</option>
                                            <option value="GG" label="Guernsey">Guernsey</option>
                                            <option value="HU" label="Hungary">Hungary</option>
                                            <option value="IS" label="Iceland">Iceland</option>
                                            <option value="IE" label="Ireland">Ireland</option>
                                            <option value="IM" label="Isle of Man">Isle of Man</option>
                                            <option value="IT" label="Italy">Italy</option>
                                            <option value="JE" label="Jersey">Jersey</option>
                                            <option value="LV" label="Latvia">Latvia</option>
                                            <option value="LI" label="Liechtenstein">Liechtenstein</option>
                                            <option value="LT" label="Lithuania">Lithuania</option>
                                            <option value="LU" label="Luxembourg">Luxembourg</option>
                                            <option value="MK" label="Macedonia">Macedonia</option>
                                            <option value="MT" label="Malta">Malta</option>
                                            <option value="FX" label="Metropolitan France">Metropolitan France
                                            </option>
                                            <option value="MD" label="Moldova">Moldova</option>
                                            <option value="MC" label="Monaco">Monaco</option>
                                            <option value="ME" label="Montenegro">Montenegro</option>
                                            <option value="NL" label="Netherlands">Netherlands</option>
                                            <option value="NO" label="Norway">Norway</option>
                                            <option value="PL" label="Poland">Poland</option>
                                            <option value="PT" label="Portugal">Portugal</option>
                                            <option value="RO" label="Romania">Romania</option>
                                            <option value="RU" label="Russia">Russia</option>
                                            <option value="SM" label="San Marino">San Marino</option>
                                            <option value="RS" label="Serbia">Serbia</option>
                                            <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro
                                            </option>
                                            <option value="SK" label="Slovakia">Slovakia</option>
                                            <option value="SI" label="Slovenia">Slovenia</option>
                                            <option value="ES" label="Spain">Spain</option>
                                            <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                            </option>
                                            <option value="SE" label="Sweden">Sweden</option>
                                            <option value="CH" label="Switzerland">Switzerland</option>
                                            <option value="UA" label="Ukraine">Ukraine</option>
                                            <option value="SU" label="Union of Soviet Socialist Republics">Union of
                                                Soviet Socialist Republics</option>
                                            <option value="GB" label="United Kingdom">United Kingdom</option>
                                            <option value="VA" label="Vatican City">Vatican City</option>
                                            <option value="AX" label="Åland Islands">Åland Islands</option>
                                        </optgroup>
                                        <optgroup id="country-optgroup-Oceania2" label="Oceania">
                                            <option value="AS" label="American Samoa">American Samoa</option>
                                            <option value="AQ" label="Antarctica">Antarctica</option>
                                            <option value="AU" label="Australia">Australia</option>
                                            <option value="BV" label="Bouvet Island">Bouvet Island</option>
                                            <option value="IO" label="British Indian Ocean Territory">British Indian
                                                Ocean Territory</option>
                                            <option value="CX" label="Christmas Island">Christmas Island</option>
                                            <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling]
                                                Islands</option>
                                            <option value="CK" label="Cook Islands">Cook Islands</option>
                                            <option value="FJ" label="Fiji">Fiji</option>
                                            <option value="PF" label="French Polynesia">French Polynesia</option>
                                            <option value="TF" label="French Southern Territories">French Southern
                                                Territories</option>
                                            <option value="GU" label="Guam">Guam</option>
                                            <option value="HM" label="Heard Island and McDonald Islands">Heard
                                                Island and McDonald Islands</option>
                                            <option value="KI" label="Kiribati">Kiribati</option>
                                            <option value="MH" label="Marshall Islands">Marshall Islands</option>
                                            <option value="FM" label="Micronesia">Micronesia</option>
                                            <option value="NR" label="Nauru">Nauru</option>
                                            <option value="NC" label="New Caledonia">New Caledonia</option>
                                            <option value="NZ" label="New Zealand">New Zealand</option>
                                            <option value="NU" label="Niue">Niue</option>
                                            <option value="NF" label="Norfolk Island">Norfolk Island</option>
                                            <option value="MP" label="Northern Mariana Islands">Northern Mariana
                                                Islands</option>
                                            <option value="PW" label="Palau">Palau</option>
                                            <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                                            <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                                            <option value="WS" label="Samoa">Samoa</option>
                                            <option value="SB" label="Solomon Islands">Solomon Islands</option>
                                            <option value="GS" label="South Georgia and the South Sandwich Islands">
                                                South Georgia and the South Sandwich Islands</option>
                                            <option value="TK" label="Tokelau">Tokelau</option>
                                            <option value="TO" label="Tonga">Tonga</option>
                                            <option value="TV" label="Tuvalu">Tuvalu</option>
                                            <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor
                                                Outlying Islands</option>
                                            <option value="VU" label="Vanuatu">Vanuatu</option>
                                            <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="text-uppercase d-none">State:</label>
                                        <div class="form-group select-wrapper">
                                            <select id="address_province2" name="address[province]" data-default="">
                                                <option value="0" label="Select a state" selected="selected">
                                                    Select a state</option>
                                                <option value="AL">Alabama</option>
                                                <option value="AK">Alaska</option>
                                                <option value="AZ">Arizona</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="CA">California</option>
                                                <option value="CO">Colorado</option>
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="DC">District Of Columbia</option>
                                                <option value="FL">Florida</option>
                                                <option value="GA">Georgia</option>
                                                <option value="HI">Hawaii</option>
                                                <option value="ID">Idaho</option>
                                                <option value="IL">Illinois</option>
                                                <option value="IN">Indiana</option>
                                                <option value="IA">Iowa</option>
                                                <option value="KS">Kansas</option>
                                                <option value="KY">Kentucky</option>
                                                <option value="LA">Louisiana</option>
                                                <option value="ME">Maine</option>
                                                <option value="MD">Maryland</option>
                                                <option value="MA">Massachusetts</option>
                                                <option value="MI">Michigan</option>
                                                <option value="MN">Minnesota</option>
                                                <option value="MS">Mississippi</option>
                                                <option value="MO">Missouri</option>
                                                <option value="MT">Montana</option>
                                                <option value="NE">Nebraska</option>
                                                <option value="NV">Nevada</option>
                                                <option value="NH">New Hampshire</option>
                                                <option value="NJ">New Jersey</option>
                                                <option value="NM">New Mexico</option>
                                                <option value="NY">New York</option>
                                                <option value="NC">North Carolina</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="OH">Ohio</option>
                                                <option value="OK">Oklahoma</option>
                                                <option value="OR">Oregon</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="SD">South Dakota</option>
                                                <option value="TN">Tennessee</option>
                                                <option value="TX">Texas</option>
                                                <option value="UT">Utah</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WA">Washington</option>
                                                <option value="WV">West Virginia</option>
                                                <option value="WI">Wisconsin</option>
                                                <option value="WY">Wyoming</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-uppercase d-none">Zip/postal code:</label>
                                        <div class="form-group"><input type="text" placeholder="Zip/postal code"
                                                class="form-control"></div>
                                    </div>
                                </div>
                                <label class="text-uppercase d-none">Address:</label>
                                <div class="form-group mb-0"><input type="text" placeholder="Address"
                                        class="form-control"></div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-md-6 col-lg-4 mt-2 mt-md-0">
                        <div class="card card--grey">
                            <div class="card-body">
                                <h2 class="pb-1 fs-6">Phương thức vận chuyển</h2>
                                <div class="customRadio clearfix">
                                    <input id="formcheckoutRadio1" value="" name="radio1" type="radio"
                                        class="radio" checked="checked">
                                    <label for="formcheckoutRadio1">Giao hàng tiêu chuẩn $2.99 (3-5 days)</label>
                                </div>
                                <div class="customRadio clearfix">
                                    <input id="formcheckoutRadio2" value="" name="radio1" type="radio"
                                        class="radio">
                                    <label for="formcheckoutRadio2">Vận chuyển nhanh $10.99 (1-2 days)</label>
                                </div>
                                <div class="customRadio clearfix mb-0">
                                    <input id="formcheckoutRadio3" value="" name="radio1" type="radio"
                                        class="radio">
                                    <label for="formcheckoutRadio3">Cùng ngày $20.00 (Evening Delivery)</label>
                                </div>
                            </div>
                        </div>
                        <div class="card card--grey mt-2">
                            <div class="card-body">
                                @if (session('fee'))
                                    <input type="hidden" name="order_fee" class="order_fee" value="{{ session('fee') }}">
                                @endif

                                @if (session('coupon'))
                                    @foreach (session('coupon') as $key => $cou)
                                        <input type="hidden" name="order_coupon" class="order_coupon"
                                            value="{{ $cou['coupon_code'] }}">
                                    @endforeach
                                @else
                                    <input type="hidden" name="order_coupon" class="order_coupon" value="0">
                                @endif
                                <h2 class="fs-6">Phương thức thanh toán</h2>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="customRadio clearfix">
                                            <input id="formcheckoutRadio4" value="1" name="radio2" type="radio"
                                                class="radio" checked="checked">
                                            <label for="formcheckoutRadio4">Thanh toán khi nhận hàng</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="customRadio clearfix">
                                            <input id="formcheckoutRadio5" value="2" name="radio2" type="radio"
                                                class="radio">
                                            <label for="formcheckoutRadio5">Paypal</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="customRadio clearfix">
                                            <input id="formcheckoutRadio6" value="3" name="radio2" type="radio"
                                                class="radio">
                                            <label for="formcheckoutRadio6">Credit Card</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="text-uppercase d-none">Card Number</label>
                                        <div class="form-group"><input type="text" placeholder="Card Number"
                                                class="form-control" pattern="[0-9\-]*"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="text-uppercase">Month:</label>
                                        <div class="form-group select-wrapper">
                                            <select class="form-control">
                                                <option selected="selected" value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="text-uppercase">Year:</label>
                                        <div class="form-group select-wrapper">
                                            <select class="form-control">
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="text-uppercase d-none">CVV Code</label>
                                        <div class="form-group m-0"><input type="text" placeholder="CVV Code"
                                                class="form-control" pattern="[0-9\-]*"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card--grey mt-2">
                            <div class="card-body">
                                <h2 class="fs-6">Ghi chú đơn hàng</h2>
                                <label class="text-uppercase d-none">Viết ghi chú tại đây:</label>
                                <textarea class="form-control textarea--height-200 shipping_notes" rows="5" name="shipping_notes" placeholder="Viết ghi chú tại đây"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 mt-2 mt-lg-0">
                        <h2 class="title fs-6">Xem lại và thanh toán</h2>
                        <div class="table-responsive order-table style1">
                            <table class="table table-bordered align-middle table-hover text-center mb-1">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th class="text-start">Tên</th>
                                        <th>Giá tiền</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach (Session('cart') as $key => $cart)
                                        @php
                                            $subtotal = $cart['product_price'] * $cart['product_qty'];
                                            $total += $subtotal;
                                        @endphp
                                        <tr>
                                            <td class="thumbImg"><a href="" class="thumb d-inline-block"><img
                                                        class="cart__image"
                                                        src="{{ asset('uploads/product/' . $cart['product_image']) }}"
                                                        alt="{{ $cart['product_name'] }}" width="80" /></a></td>
                                            <td class="text-start">
                                                <a href="">{{ $cart['product_name'] }}</a>
                                                <div class="cart__meta-text">
                                                    Color: Black<br>Size: Small<br>
                                                </div>
                                            </td>
                                            <td>{{ number_format($cart['product_price'], 0, ',', '.') }}VND</td>
                                            <td>{{ $cart['product_qty'] }}</td>
                                            <td class="fw-500">{{ number_format($subtotal, 0, ',', '.') }}VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="font-weight-600">
                                    <tr>
                                        <td colspan="4" class="text-end fw-bolder"> Tổng tiền </td>
                                        <td class="fw-bolder">
                                            {{ number_format($total, 0, ',', '.') }}VND
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end fw-bolder"> Giảm giá </td>
                                        <td class="fw-bolder">
                                            @if (Session('coupon'))
                                                @foreach (Session('coupon') as $key => $cou)
                                                    @if ($cou['coupon_condition'] == 1)
                                                        <span
                                                            class="col-6 col-sm-6 text-right">-{{ $cou['coupon_number'] }}
                                                            %
                                                            @php
                                                                $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                                echo ' (' . number_format($total_coupon, 0, ',', '.') . ' VND) ';
                                                            @endphp
                                                        </span>
                                                    @elseif($cou['coupon_condition'] == 2)
                                                        <span
                                                            class="col-6 col-sm-6 text-right">-{{ number_format($cou['coupon_number'], 0, ',', '.') }}
                                                            VND</span>
                                                        @php
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @else
                                                <span class="col-6 col-sm-6 text-right">0 VNĐ</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end fw-bolder"> Phí vận chuyển </td>
                                        <td class="fw-bolder">
                                            @if (session('cart'))
                                                @if (Session('fee'))
                                                    {{ number_format(Session('fee'), 0, ',', '.') }} VND
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end fw-bolder">Thành tiền</td>
                                        <td class="fw-bolder">
                                            @if (session('cart'))
                                                @php
                                                    if (Session('fee') && !Session('coupon')) {
                                                        $total_all = $total + Session('fee');
                                                        echo number_format($total_all, 0, ',', '.') . ' VND';
                                                    } elseif (Session('fee') && Session('coupon')) {
                                                        if ($cou['coupon_condition'] == 1) {
                                                            $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                            $total_all_coupon = $total - $total_coupon + Session('fee');
                                                            echo number_format($total_all_coupon, 0, ',', '.') . ' VND';
                                                        } elseif ($cou['coupon_condition'] == 2) {
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                            $total_all_coupon = $total_coupon + Session('fee');
                                                            echo number_format($total_all_coupon, 0, ',', '.') . ' VND';
                                                        }
                                                    } elseif (!Session('fee') && Session('coupon')) {
                                                        echo number_format($sub_total_coupon, 0, ',', '.') . ' VND';
                                                    } elseif (!Session('fee') && !Session('coupon')) {
                                                        echo number_format($total, 0, ',', '.') . ' VND';
                                                    }
                                                @endphp
                                            @endif
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="card card--grey mt-2">
                            <div class="card-body">
                                <h2 class="fs-6">Mã giảm giá</h2>
                                <form action="{{ asset('check-coupon') }}" method="post">
                                    @csrf
                                    <label class="text-uppercase d-none">Nhập mã giảm giá:</label>
                                    <div class="input-group flex-nowrap">
                                        <input class="input-group__field" type="text" placeholder="Mã giảm giá"
                                            name="coupon">
                                        <span class="input-group__btn">
                                            <input type="submit" name="check_coupon" class="btn rounded-end text-nowrap"
                                                value="Xác nhận">
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="order-button-payment mt-2 clearfix">
                            {{-- <input
                                class="cartCheckout fs-6 btn btn-lg rounded w-100 fw-600 text-white send_order"
                                name="send_order">Xác nhận đặt hàng > --}}
                            <input class="cartCheckout fs-6 btn btn-lg rounded w-100 fw-600 text-white send_order"
                                type="button" name="send_order" value="Xác nhận đơn hàng">
                        </div>
                        <div class="paymnet-img text-center"><img src="{{ asset('assets/images/payment-img.jpg') }}"
                                alt="Payment">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--End Main Content-->
    </div>
    <!--End Body Container-->
@endsection
