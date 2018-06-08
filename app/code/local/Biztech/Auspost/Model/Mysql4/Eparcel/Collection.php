<?php

class Biztech_Auspost_Model_Mysql4_Eparcel_Collection extends Varien_Data_Collection_Db
{
    protected $_shipTable;
    protected $_countryTable;
    protected $_regionTable;

    public function __construct()
    {
        $coreResource = Mage::getSingleton('core/resource');
        parent::__construct($coreResource->getConnection('auspost_read'));
        $this->_shipTable = $coreResource->getTableName('auspost/eparcel');
        $this->_countryTable = $coreResource->getTableName('directory/country');
        $this->_regionTable = $coreResource->getTableName('directory/country_region');
        $this->_select->from(array("s" => $this->_shipTable))
            ->joinLeft(array("c" => $this->_countryTable), 'c.country_id = s.dest_country_id', 'iso3_code AS dest_country')
            ->joinLeft(array("r" => $this->_regionTable), 'r.region_id = s.dest_region_id', 'code AS dest_region')
            ->order(array("dest_country", "dest_region", "dest_zip"));
        $this->_setIdFieldName('pk');
        return $this;
    }

    public function setWebsiteFilter($websiteId)
    {
        $this->_select->where("website_id = ?", $websiteId);

        return $this;
    }

    public function setConditionFilter($conditionName)
    {
        $this->_select->where("condition_name = ?", $conditionName);

        return $this;
    }

    public function setCountryFilter($countryId)
    {
        $this->_select->where("dest_country_id = ?", $countryId);

        return $this;
    }
}
