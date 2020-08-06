<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = array(
            array('id' => 1,'name' => "Afghanistan"),
            array('id' => 2,'name' => "Albania"),
            array('id' => 3,'name' => "Algeria"),
            array('id' => 4,'name' => "American Samoa"),
            array('id' => 5,'name' => "Andorra"),
            array('id' => 6,'name' => "Angola"),
            array('id' => 7,'name' => "Anguilla"),
            array('id' => 8,'name' => "Antarctica"),
            array('id' => 9,'name' => "Antigua And Barbuda"),
            array('id' => 10,'name' => "Argentina"),
            array('id' => 11,'name' => "Armenia"),
            array('id' => 12,'name' => "Aruba"),
            array('id' => 13,'name' => "Australia"),
            array('id' => 14,'name' => "Austria"),
            array('id' => 15,'name' => "Azerbaijan"),
            array('id' => 16,'name' => "Bahamas The"),
            array('id' => 17,'name' => "Bahrain"),
            array('id' => 18,'name' => "Bangladesh"),
            array('id' => 19,'name' => "Barbados"),
            array('id' => 20,'name' => "Belarus"),
            array('id' => 21,'name' => "Belgium"),
            array('id' => 22,'name' => "Belize"),
            array('id' => 23,'name' => "Benin"),
            array('id' => 24,'name' => "Bermuda"),
            array('id' => 25,'name' => "Bhutan"),
            array('id' => 26,'name' => "Bolivia"),
            array('id' => 27,'name' => "Bosnia and Herzegovina"),
            array('id' => 28,'name' => "Botswana"),
            array('id' => 29,'name' => "Bouvet Island"),
            array('id' => 30,'name' => "Brazil"),
            array('id' => 31,'name' => "British Indian Ocean Territory"),
            array('id' => 32,'name' => "Brunei"),
            array('id' => 33,'name' => "Bulgaria"),
            array('id' => 34,'name' => "Burkina Faso"),
            array('id' => 35,'name' => "Burundi"),
            array('id' => 36,'name' => "Cambodia"),
            array('id' => 37,'name' => "Cameroon"),
            array('id' => 38,'name' => "Canada"),
            array('id' => 39,'name' => "Cape Verde"),
            array('id' => 40,'name' => "Cayman Islands"),
            array('id' => 41,'name' => "Central African Republic"),
            array('id' => 42,'name' => "Chad"),
            array('id' => 43,'name' => "Chile"),
            array('id' => 44,'name' => "China"),
            array('id' => 45,'name' => "Christmas Island"),
            array('id' => 46,'name' => "Cocos (Keeling) Islands"),
            array('id' => 47,'name' => "Colombia"),
            array('id' => 48,'name' => "Comoros"),
            array('id' => 49,'name' => "Congo"),
            array('id' => 50,'name' => "Congo The Democratic Republic Of The"),
            array('id' => 51,'name' => "Cook Islands"),
            array('id' => 52,'name' => "Costa Rica"),
            array('id' => 53,'name' => "Cote D Ivoire (Ivory Coast)"),
            array('id' => 54,'name' => "Croatia (Hrvatska)"),
            array('id' => 55,'name' => "Cuba"),
            array('id' => 56,'name' => "Cyprus"),
            array('id' => 57,'name' => "Czech Republic"),
            array('id' => 58,'name' => "Denmark"),
            array('id' => 59,'name' => "Djibouti"),
            array('id' => 60,'name' => "Dominica"),
            array('id' => 61,'name' => "Dominican Republic"),
            array('id' => 62,'name' => "East Timor"),
            array('id' => 63,'name' => "Ecuador"),
            array('id' => 64,'name' => "Egypt"),
            array('id' => 65,'name' => "El Salvador"),
            array('id' => 66,'name' => "Equatorial Guinea"),
            array('id' => 67,'name' => "Eritrea"),
            array('id' => 68,'name' => "Estonia"),
            array('id' => 69,'name' => "Ethiopia"),
            array('id' => 70,'name' => "External Territories of Australia"),
            array('id' => 71,'name' => "Falkland Islands"),
            array('id' => 72,'name' => "Faroe Islands"),
            array('id' => 73,'name' => "Fiji Islands"),
            array('id' => 74,'name' => "Finland"),
            array('id' => 75,'name' => "France"),
            array('id' => 76,'name' => "French Guiana"),
            array('id' => 77,'name' => "French Polynesia"),
            array('id' => 78,'name' => "French Southern Territories"),
            array('id' => 79,'name' => "Gabon"),
            array('id' => 80,'name' => "Gambia The"),
            array('id' => 81,'name' => "Georgia"),
            array('id' => 82,'name' => "Germany"),
            array('id' => 83,'name' => "Ghana"),
            array('id' => 84,'name' => "Gibraltar"),
            array('id' => 85,'name' => "Greece"),
            array('id' => 86,'name' => "Greenland"),
            array('id' => 87,'name' => "Grenada"),
            array('id' => 88,'name' => "Guadeloupe"),
            array('id' => 89,'name' => "Guam"),
            array('id' => 90,'name' => "Guatemala"),
            array('id' => 91,'name' => "Guernsey and Alderney"),
            array('id' => 92,'name' => "Guinea"),
            array('id' => 93,'name' => "Guinea-Bissau"),
            array('id' => 94,'name' => "Guyana"),
            array('id' => 95,'name' => "Haiti"),
            array('id' => 96,'name' => "Heard and McDonald Islands"),
            array('id' => 97,'name' => "Honduras"),
            array('id' => 98,'name' => "Hong Kong S.A.R."),
            array('id' => 99,'name' => "Hungary"),
            array('id' => 100,'name' => "Iceland"),
            array('id' => 101,'name' => "India"),
            array('id' => 102,'name' => "Indonesia"),
            array('id' => 103,'name' => "Iran"),
            array('id' => 104,'name' => "Iraq"),
            array('id' => 105,'name' => "Ireland"),
            array('id' => 106,'name' => "Israel"),
            array('id' => 107,'name' => "Italy"),
            array('id' => 108,'name' => "Jamaica"),
            array('id' => 109,'name' => "Japan"),
            array('id' => 110,'name' => "Jersey"),
            array('id' => 111,'name' => "Jordan"),
            array('id' => 112,'name' => "Kazakhstan"),
            array('id' => 113,'name' => "Kenya"),
            array('id' => 114,'name' => "Kiribati"),
            array('id' => 115,'name' => "Korea North"),
            array('id' => 116,'name' => "Korea South"),
            array('id' => 117,'name' => "Kuwait"),
            array('id' => 118,'name' => "Kyrgyzstan"),
            array('id' => 119,'name' => "Laos"),
            array('id' => 120,'name' => "Latvia"),
            array('id' => 121,'name' => "Lebanon"),
            array('id' => 122,'name' => "Lesotho"),
            array('id' => 123,'name' => "Liberia"),
            array('id' => 124,'name' => "Libya"),
            array('id' => 125,'name' => "Liechtenstein"),
            array('id' => 126,'name' => "Lithuania"),
            array('id' => 127,'name' => "Luxembourg"),
            array('id' => 128,'name' => "Macau S.A.R."),
            array('id' => 129,'name' => "Macedonia"),
            array('id' => 130,'name' => "Madagascar"),
            array('id' => 131,'name' => "Malawi"),
            array('id' => 132,'name' => "Malaysia"),
            array('id' => 133,'name' => "Maldives"),
            array('id' => 134,'name' => "Mali"),
            array('id' => 135,'name' => "Malta"),
            array('id' => 136,'name' => "Man (Isle of)"),
            array('id' => 137,'name' => "Marshall Islands"),
            array('id' => 138,'name' => "Martinique"),
            array('id' => 139,'name' => "Mauritania"),
            array('id' => 140,'name' => "Mauritius"),
            array('id' => 141,'name' => "Mayotte"),
            array('id' => 142,'name' => "Mexico"),
            array('id' => 143,'name' => "Micronesia"),
            array('id' => 144,'name' => "Moldova"),
            array('id' => 145,'name' => "Monaco"),
            array('id' => 146,'name' => "Mongolia"),
            array('id' => 147,'name' => "Montserrat"),
            array('id' => 148,'name' => "Morocco"),
            array('id' => 149,'name' => "Mozambique"),
            array('id' => 150,'name' => "Myanmar"),
            array('id' => 151,'name' => "Namibia"),
            array('id' => 152,'name' => "Nauru"),
            array('id' => 153,'name' => "Nepal"),
            array('id' => 154,'name' => "Netherlands Antilles"),
            array('id' => 155,'name' => "Netherlands The"),
            array('id' => 156,'name' => "New Caledonia"),
            array('id' => 157,'name' => "New Zealand"),
            array('id' => 158,'name' => "Nicaragua"),
            array('id' => 159,'name' => "Niger"),
            array('id' => 160,'name' => "Nigeria"),
            array('id' => 161,'name' => "Niue"),
            array('id' => 162,'name' => "Norfolk Island"),
            array('id' => 163,'name' => "Northern Mariana Islands"),
            array('id' => 164,'name' => "Norway"),
            array('id' => 165,'name' => "Oman"),
            array('id' => 166,'name' => "Pakistan"),
            array('id' => 167,'name' => "Palau"),
            array('id' => 168,'name' => "Palestinian Territory Occupied"),
            array('id' => 169,'name' => "Panama"),
            array('id' => 170,'name' => "Papua new Guinea"),
            array('id' => 171,'name' => "Paraguay"),
            array('id' => 172,'name' => "Peru"),
            array('id' => 173,'name' => "Philippines"),
            array('id' => 174,'name' => "Pitcairn Island"),
            array('id' => 175,'name' => "Poland"),
            array('id' => 176,'name' => "Portugal"),
            array('id' => 177,'name' => "Puerto Rico"),
            array('id' => 178,'name' => "Qatar"),
            array('id' => 179,'name' => "Reunion"),
            array('id' => 180,'name' => "Romania"),
            array('id' => 181,'name' => "Russia"),
            array('id' => 182,'name' => "Rwanda"),
            array('id' => 183,'name' => "Saint Helena"),
            array('id' => 184,'name' => "Saint Kitts And Nevis"),
            array('id' => 185,'name' => "Saint Lucia"),
            array('id' => 186,'name' => "Saint Pierre and Miquelon"),
            array('id' => 187,'name' => "Saint Vincent And The Grenadines"),
            array('id' => 188,'name' => "Samoa"),
            array('id' => 189,'name' => "San Marino"),
            array('id' => 190,'name' => "Sao Tome and Principe"),
            array('id' => 191,'name' => "Saudi Arabia"),
            array('id' => 192,'name' => "Senegal"),
            array('id' => 193,'name' => "Serbia"),
            array('id' => 194,'name' => "Seychelles"),
            array('id' => 195,'name' => "Sierra Leone"),
            array('id' => 196,'name' => "Singapore"),
            array('id' => 197,'name' => "Slovakia"),
            array('id' => 198,'name' => "Slovenia"),
            array('id' => 199,'name' => "Smaller Territories of the UK"),
            array('id' => 200,'name' => "Solomon Islands"),
            array('id' => 201,'name' => "Somalia"),
            array('id' => 202,'name' => "South Africa"),
            array('id' => 203,'name' => "South Georgia"),
            array('id' => 204,'name' => "South Sudan"),
            array('id' => 205,'name' => "Spain"),
            array('id' => 206,'name' => "Sri Lanka"),
            array('id' => 207,'name' => "Sudan"),
            array('id' => 208,'name' => "Suriname"),
            array('id' => 209,'name' => "Svalbard And Jan Mayen Islands"),
            array('id' => 210,'name' => "Swaziland"),
            array('id' => 211,'name' => "Sweden"),
            array('id' => 212,'name' => "Switzerland"),
            array('id' => 213,'name' => "Syria"),
            array('id' => 214,'name' => "Taiwan"),
            array('id' => 215,'name' => "Tajikistan"),
            array('id' => 216,'name' => "Tanzania"),
            array('id' => 217,'name' => "Thailand"),
            array('id' => 218,'name' => "Togo"),
            array('id' => 219,'name' => "Tokelau"),
            array('id' => 220,'name' => "Tonga"),
            array('id' => 221,'name' => "Trinidad And Tobago"),
            array('id' => 222,'name' => "Tunisia"),
            array('id' => 223,'name' => "Turkey"),
            array('id' => 224,'name' => "Turkmenistan"),
            array('id' => 225,'name' => "Turks And Caicos Islands"),
            array('id' => 226,'name' => "Tuvalu"),
            array('id' => 227,'name' => "Uganda"),
            array('id' => 228,'name' => "Ukraine"),
            array('id' => 229,'name' => "United Arab Emirates"),
            array('id' => 230,'name' => "United Kingdom"),
            array('id' => 231,'name' => "United States"),
            array('id' => 232,'name' => "United States Minor Outlying Islands"),
            array('id' => 233,'name' => "Uruguay"),
            array('id' => 234,'name' => "Uzbekistan"),
            array('id' => 235,'name' => "Vanuatu"),
            array('id' => 236,'name' => "Vatican City State (Holy See)"),
            array('id' => 237,'name' => "Venezuela"),
            array('id' => 238,'name' => "Vietnam"),
            array('id' => 239,'name' => "Virgin Islands (British)"),
            array('id' => 240,'name' => "Virgin Islands (US)"),
            array('id' => 241,'name' => "Wallis And Futuna Islands"),
            array('id' => 242,'name' => "Western Sahara"),
            array('id' => 243,'name' => "Yemen"),
            array('id' => 244,'name' => "Yugoslavia"),
            array('id' => 245,'name' => "Zambia"),
            array('id' => 246,'name' => "Zimbabwe"),
            );
            DB::table('countries')->insert($countries);
    
    }
}
