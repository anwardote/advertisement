<?php

namespace Faker\Provider\en_PH;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    // http://en.wikipedia.org/wiki/Telephone_numbers_in_the_Philippines
    protected static $mobileFormats = array(
        '+63 (817) ###-####', '+63 (905) ###-####', '+63 (906) ###-####',
        '+63 (907) ###-####', '+63 (908) ###-####', '+63 (909) ###-####',
        '+63 (912) ###-####', '+63 (915) ###-####', '+63 (916) ###-####',
        '+63 (917) ###-####', '+63 (918) ###-####', '+63 (919) ###-####',
        '+63 (921) ###-####', '+63 (922) ###-####', '+63 (923) ###-####',
        '+63 (925) ###-####', '+63 (926) ###-####', '+63 (927) ###-####',
        '+63 (928) ###-####', '+63 (929) ###-####', '+63 (920) ###-####',
        '+63 (932) ###-####', '+63 (933) ###-####', '+63 (934) ###-####',
        '+63 (935) ###-####', '+63 (936) ###-####', '+63 (937) ###-####',
        '+63 (938) ###-####', '+63 (939) ###-####', '+63 (930) ###-####',
        '+63 (942) ###-####', '+63 (943) ###-####', '+63 (946) ###-####',
        '+63 (947) ###-####', '+63 (948) ###-####', '+63 (949) ###-####',
        '+63 (973) ###-####', '+63 (974) ###-####', '+63 (975) ###-####',
        '+63 (977) ###-####', '+63 (978) ###-####', '+63 (979) ###-####',
        '+63 (989) ###-####', '+63 (994) ###-####', '+63 (996) ###-####',
        '+63 (997) ###-####', '+63 (998) ###-####', '+63 (999) ###-####',
        '(0817) ###-####', '(0905) ###-####', '(0906) ###-####',
        '(0907) ###-####', '(0908) ###-####', '(0909) ###-####',
        '(0912) ###-####', '(0915) ###-####', '(0916) ###-####',
        '(0917) ###-####', '(0918) ###-####', '(0919) ###-####',
        '(0921) ###-####', '(0922) ###-####', '(0923) ###-####',
        '(0925) ###-####', '(0926) ###-####', '(0927) ###-####',
        '(0928) ###-####', '(0929) ###-####', '(0920) ###-####',
        '(0932) ###-####', '(0933) ###-####', '(0934) ###-####',
        '(0935) ###-####', '(0936) ###-####', '(0937) ###-####',
        '(0938) ###-####', '(0939) ###-####', '(0930) ###-####',
        '(0942) ###-####', '(0943) ###-####', '(0946) ###-####',
        '(0947) ###-####', '(0948) ###-####', '(0949) ###-####',
        '(0973) ###-####', '(0974) ###-####', '(0975) ###-####',
        '(0977) ###-####', '(0978) ###-####', '(0979) ###-####',
        '(0989) ###-####', '(0994) ###-####', '(0996) ###-####',
        '(0997) ###-####', '(0998) ###-####', '(0999) ###-####',
    );

    /**
     * Return a en_PH mobile phone number
     * @return string
     */
    public static function mobileNumber()
    {
        return static::numerify(static::randomElement(static::$mobileFormats));
    }
}
