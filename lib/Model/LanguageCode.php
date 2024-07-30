<?php
/**
 * LanguageCode
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Foxdeli Tracking service API
 *
 * Foxdeli API implements JWT tokens as its chosen method of authentication, requiring that these tokens be included in the HTTP header X-API-Key for each request.
 *
 * The version of the OpenAPI document: 14.90.0
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.6.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Foxdeli\ApiPhpSdk\Model;
use \Foxdeli\ApiPhpSdk\ObjectSerializer;

/**
 * LanguageCode Class Doc Comment
 *
 * @category Class
 * @description Order language - two letter language code - ISO-639-1
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class LanguageCode
{
    /**
     * Possible values of this enum
     */
    public const UNDEFINED = 'undefined';

    public const AA = 'aa';

    public const AB = 'ab';

    public const AE = 'ae';

    public const AF = 'af';

    public const AK = 'ak';

    public const AM = 'am';

    public const AN = 'an';

    public const AR = 'ar';

    public const _AS = 'as';

    public const AV = 'av';

    public const AY = 'ay';

    public const AZ = 'az';

    public const BA = 'ba';

    public const BE = 'be';

    public const BG = 'bg';

    public const BH = 'bh';

    public const BI = 'bi';

    public const BM = 'bm';

    public const BN = 'bn';

    public const BO = 'bo';

    public const BR = 'br';

    public const BS = 'bs';

    public const CA = 'ca';

    public const CE = 'ce';

    public const CH = 'ch';

    public const CO = 'co';

    public const CR = 'cr';

    public const CS = 'cs';

    public const CU = 'cu';

    public const CV = 'cv';

    public const CY = 'cy';

    public const DA = 'da';

    public const DE = 'de';

    public const DV = 'dv';

    public const DZ = 'dz';

    public const EE = 'ee';

    public const EL = 'el';

    public const EN = 'en';

    public const EO = 'eo';

    public const ES = 'es';

    public const ET = 'et';

    public const EU = 'eu';

    public const FA = 'fa';

    public const FF = 'ff';

    public const FI = 'fi';

    public const FJ = 'fj';

    public const FO = 'fo';

    public const FR = 'fr';

    public const FY = 'fy';

    public const GA = 'ga';

    public const GD = 'gd';

    public const GL = 'gl';

    public const GN = 'gn';

    public const GU = 'gu';

    public const GV = 'gv';

    public const HA = 'ha';

    public const HE = 'he';

    public const HI = 'hi';

    public const HO = 'ho';

    public const HR = 'hr';

    public const HT = 'ht';

    public const HU = 'hu';

    public const HY = 'hy';

    public const HZ = 'hz';

    public const IA = 'ia';

    public const ID = 'id';

    public const IE = 'ie';

    public const IG = 'ig';

    public const II = 'ii';

    public const IK = 'ik';

    public const IO = 'io';

    public const IS = 'is';

    public const IT = 'it';

    public const IU = 'iu';

    public const JA = 'ja';

    public const JV = 'jv';

    public const KA = 'ka';

    public const KG = 'kg';

    public const KI = 'ki';

    public const KJ = 'kj';

    public const KK = 'kk';

    public const KL = 'kl';

    public const KM = 'km';

    public const KN = 'kn';

    public const KO = 'ko';

    public const KR = 'kr';

    public const KS = 'ks';

    public const KU = 'ku';

    public const KV = 'kv';

    public const KW = 'kw';

    public const KY = 'ky';

    public const LA = 'la';

    public const LB = 'lb';

    public const LG = 'lg';

    public const LI = 'li';

    public const LN = 'ln';

    public const LO = 'lo';

    public const LT = 'lt';

    public const LU = 'lu';

    public const LV = 'lv';

    public const MG = 'mg';

    public const MH = 'mh';

    public const MI = 'mi';

    public const MK = 'mk';

    public const ML = 'ml';

    public const MN = 'mn';

    public const MR = 'mr';

    public const MS = 'ms';

    public const MT = 'mt';

    public const MY = 'my';

    public const NA = 'na';

    public const NB = 'nb';

    public const ND = 'nd';

    public const NE = 'ne';

    public const NG = 'ng';

    public const NL = 'nl';

    public const NN = 'nn';

    public const NO = 'no';

    public const NR = 'nr';

    public const NV = 'nv';

    public const NY = 'ny';

    public const OC = 'oc';

    public const OJ = 'oj';

    public const OM = 'om';

    public const _OR = 'or';

    public const OS = 'os';

    public const PA = 'pa';

    public const PI = 'pi';

    public const PL = 'pl';

    public const PS = 'ps';

    public const PT = 'pt';

    public const QU = 'qu';

    public const RM = 'rm';

    public const RN = 'rn';

    public const RO = 'ro';

    public const RU = 'ru';

    public const RW = 'rw';

    public const SA = 'sa';

    public const SC = 'sc';

    public const SD = 'sd';

    public const SE = 'se';

    public const SG = 'sg';

    public const SI = 'si';

    public const SK = 'sk';

    public const SL = 'sl';

    public const SM = 'sm';

    public const SN = 'sn';

    public const SO = 'so';

    public const SQ = 'sq';

    public const SR = 'sr';

    public const SS = 'ss';

    public const ST = 'st';

    public const SU = 'su';

    public const SV = 'sv';

    public const SW = 'sw';

    public const TA = 'ta';

    public const TE = 'te';

    public const TG = 'tg';

    public const TH = 'th';

    public const TI = 'ti';

    public const TK = 'tk';

    public const TL = 'tl';

    public const TN = 'tn';

    public const TO = 'to';

    public const TR = 'tr';

    public const TS = 'ts';

    public const TT = 'tt';

    public const TW = 'tw';

    public const TY = 'ty';

    public const UG = 'ug';

    public const UK = 'uk';

    public const UR = 'ur';

    public const UZ = 'uz';

    public const VE = 've';

    public const VI = 'vi';

    public const VO = 'vo';

    public const WA = 'wa';

    public const WO = 'wo';

    public const XH = 'xh';

    public const YI = 'yi';

    public const YO = 'yo';

    public const ZA = 'za';

    public const ZH = 'zh';

    public const ZU = 'zu';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::UNDEFINED,
            self::AA,
            self::AB,
            self::AE,
            self::AF,
            self::AK,
            self::AM,
            self::AN,
            self::AR,
            self::_AS,
            self::AV,
            self::AY,
            self::AZ,
            self::BA,
            self::BE,
            self::BG,
            self::BH,
            self::BI,
            self::BM,
            self::BN,
            self::BO,
            self::BR,
            self::BS,
            self::CA,
            self::CE,
            self::CH,
            self::CO,
            self::CR,
            self::CS,
            self::CU,
            self::CV,
            self::CY,
            self::DA,
            self::DE,
            self::DV,
            self::DZ,
            self::EE,
            self::EL,
            self::EN,
            self::EO,
            self::ES,
            self::ET,
            self::EU,
            self::FA,
            self::FF,
            self::FI,
            self::FJ,
            self::FO,
            self::FR,
            self::FY,
            self::GA,
            self::GD,
            self::GL,
            self::GN,
            self::GU,
            self::GV,
            self::HA,
            self::HE,
            self::HI,
            self::HO,
            self::HR,
            self::HT,
            self::HU,
            self::HY,
            self::HZ,
            self::IA,
            self::ID,
            self::IE,
            self::IG,
            self::II,
            self::IK,
            self::IO,
            self::IS,
            self::IT,
            self::IU,
            self::JA,
            self::JV,
            self::KA,
            self::KG,
            self::KI,
            self::KJ,
            self::KK,
            self::KL,
            self::KM,
            self::KN,
            self::KO,
            self::KR,
            self::KS,
            self::KU,
            self::KV,
            self::KW,
            self::KY,
            self::LA,
            self::LB,
            self::LG,
            self::LI,
            self::LN,
            self::LO,
            self::LT,
            self::LU,
            self::LV,
            self::MG,
            self::MH,
            self::MI,
            self::MK,
            self::ML,
            self::MN,
            self::MR,
            self::MS,
            self::MT,
            self::MY,
            self::NA,
            self::NB,
            self::ND,
            self::NE,
            self::NG,
            self::NL,
            self::NN,
            self::NO,
            self::NR,
            self::NV,
            self::NY,
            self::OC,
            self::OJ,
            self::OM,
            self::_OR,
            self::OS,
            self::PA,
            self::PI,
            self::PL,
            self::PS,
            self::PT,
            self::QU,
            self::RM,
            self::RN,
            self::RO,
            self::RU,
            self::RW,
            self::SA,
            self::SC,
            self::SD,
            self::SE,
            self::SG,
            self::SI,
            self::SK,
            self::SL,
            self::SM,
            self::SN,
            self::SO,
            self::SQ,
            self::SR,
            self::SS,
            self::ST,
            self::SU,
            self::SV,
            self::SW,
            self::TA,
            self::TE,
            self::TG,
            self::TH,
            self::TI,
            self::TK,
            self::TL,
            self::TN,
            self::TO,
            self::TR,
            self::TS,
            self::TT,
            self::TW,
            self::TY,
            self::UG,
            self::UK,
            self::UR,
            self::UZ,
            self::VE,
            self::VI,
            self::VO,
            self::WA,
            self::WO,
            self::XH,
            self::YI,
            self::YO,
            self::ZA,
            self::ZH,
            self::ZU
        ];
    }
}


