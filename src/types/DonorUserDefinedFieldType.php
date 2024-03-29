<?php
namespace DonorPerfectApi\Types;

class DonorUserDefinedFieldType extends BaseType
{

    protected static $required = [
        'donor_id'
    ];

    protected static $numericTypes = [
        'donor_id',
    ];

    protected static $fields = [
        'donor_id',
        'MCAT',
        'OCCCODE',
        'COMP',
        'MCAT_ENROLL_DATE',
        'GEOG',
        'INTERESTS',
        'LOGRANT',
        'GRADYR',
        'BDAT',
        'DNICK',
        'SCHOOLDISTRICT',
        'STATESENATEDISTRICT',
        'FEDERALSEN',
        'ATTORNEY',
        'EXECUTOR',
        'EMPLOYER',
        'INCOME',
        'PPLEDGE',
        'PROS_RATE',
        'MCAT_UPDOWN',
        'MCAT_EXPIRE_DATE',
        'GIVEN',
        'ASSETS',
        'GRANTYPES',
        'HIGRANT',
        'DEADLINES',
        'COLLEGE',
        'DEGREE',
        'STATECONGDISTRICT',
        'FEDERALCONGDISTRICT',
        'CURRENTASSETS',
        'DURABLEPOWEROFATTRNY',
        'DURABLEPOWERDATE',
        'ESTATEPLAN',
        'POLITICALPARTY',
        'CGA_AMOUNT',
        'CGA_TYPE',
        'CGA_RATE',
        'CGA_TRANSFERABLE',
        'MATCHING_GIFT',
        'ALUMNI_NOTES',
        'PLANNED_GIVING_NOTES',
        'anon',
        'INITIAL_GIFT_AMOUNT',
        'RCPT_TYPE',
        'LS_CONTACT',
        'TOTAL_BF',
        'SUM_VOLHRS',
        'LS_ACTIVITY',
        'SOLICITOR',
        'WEB',
        'IN_AMT',
        'ALTPHONE1',
        'ALTPHTYPE1',
        'VTRAIN_DT',
        'VOL_BDAT',
        'EXECPHON',
        'ATTYPHON',
        'ESTINCOME',
        'MARI_STAT',
        'PERS_IN_HH',
        'NO_ADULTS',
        'PRES_CHILD',
        'BANKCARD',
        'HOH_AGE',
        'NAME_AGE',
        'OWN_RENT',
        'DWELL_TYPE',
        'LEN_RES',
        'PR_UPDATE',
        'C_COMMIT',
        'COM_TEAM',
        'COM_TYPE',
        'TEAM_TYPE',
        'C_COMMENT',
        'DECCONF',
        'DECMATCH',
        'DECDATE',
        'DECUPDATE',
        'NUM_GIFTS',
        'GTOT',
        'LAST_GIFT',
        'FACEBOOK',
        'TWITTER',
        'LINKEDIN',
        'AVERAGE_GIFT',
        'PICTURE_URL',
        'event_constituent_id',
        'CAL_YTD',
        'LCAL_YTD',
        'ORIGINAL_ID',
        'BSR_RANGE',
        'DM_SCORE',
        'DM_SCORE2',
        'INFLUENCE_RATING',
        'INCLINATION_RATING',
        'WE_ACC_INV',
        'PG_BEQUEST',
        'PG_ANNUITY',
        'PG_TRUST',
        'INCOME_SOURCE',
        'MG_TOTAL_COMP',
        'DB_COMPANY_VALUE',
        'FEC_TOTAL',
        'DQ_PROPERTY_COUNT',
        'WE_INC_ANL',
        'REAL_ESTATE_USED',
        'STOCK_USED',
        'PENSION_USED',
        'GIVING_USED',
        'WE_EST_CAP',
        'IC_FLAG',
        'IC_MATCH_FLAG',
        'CLIENT_BIRTH_DATE',
        'WE_SCR_DT',
        'BSR_RATING',
        'QOM_DISC',
        'QOM_POWR',
        'QOM_DB',
        'QOM_DIR',
        'QOM_MG',
        'QOM_TRUST',
        'QOM_STAR',
        'QOM_GSFDN',
        'QOM_CAMP',
        'QOM_DEATH',
        'QOM_BUSREG',
        'QOM_PHIL',
        'QOM_HOOVER',
        'QOM_HH',
        'QOM_LN',
        'QOM_POLO',
        'QOM_WHOSWHO',
        'QOM_PDIR',
        'QOM_AIR',
        'QOM_527CON',
        'QOM_AIRMEN',
        'QOM_VDS',
        'WE_QOM_AMA',
        'QOM_PENSION',
        'QOM_CLIENTDONOR',
        'INCOME_USED',
        'GCINCOME',
        'CAPACITY',
        'GA_TITLE',
        'GA_ADDRESS',
        'DS_RATING',
        'RFM_TOTAL',
        'MATCH_QUALITY',
        'ASSESSED',
        'TOTAL_LIKELY_MATCHES',
        'NO_GIFT_MATCHES',
        'FND_BOARD',
        'GS_BOARD',
        'IRS_990PF',
        'FEC_COUNT',
        'LG_GIFT_HIGH',
        'LG_GIFT_LOW',
        'CAPACITY_RANGE',
        'REAL_ESTATE_EST',
        'NO_OF_PROP',
        'REAL_ESTATE_TRST',
        'SEC_HOLDINGS',
        'SEC_INSIDER',
        'MG_PROFILE',
        'MG_COMP',
        'MG_OPTIONS',
        'D_B_AFFILIATION',
        'D_B_REVENUE',
        'PENSION_ADMN',
        'PENSION_ASST',
        'ANNUAL_FUND_RTG',
        'MAJOR_GIFT_RTG',
        'PG_ID',
        'CORP_TCH',
        'FAA_PILOT',
        'AIRPLANE_OWNER',
        'BOAT_OWNER',
        'DS_SCREEN_DT',
        'MG_OPTION',
        'DS_STATUS',
        'ESTIMATED_CAPACITY',
        'DS_PROFILE_LINK',
        'SPOUSE',
        'MATCH',
        'VTOT',
        'TWITTER_LOCATION',
        'TWITTER_TWEETCOUNT',
        'TWITTER_FOLLOWERCNT',
        'TWITTER_FOLLOWCNT',
        'TG_DECEASED_TYPE',
        'TG_DECEASED_DATE',
        'TG_DECEASED_LINK',
        'TG_BIRTH_YEAR',
        'TG_NET_WORTH_DECILE',
        'TG_RELIGION',
        'TG_BUSINESS_OWNER',
        'TG_MKT_VALUE_RANGE',
        'TG_HERITAGE',
        'TG_HOME_OWNER',
        'TG_INCOME_DECILE'
    ];

    public static function getNumericTypes() {
        return self::$numericTypes;
    }
}