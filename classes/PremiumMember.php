<?php
/**
 * Created by PhpStorm.
 * User: toygan
 * Date: 2/10/18
 * Time: 6:48 PM
 */

class PremiumMember extends Member
{
    private $_indoorActivities, $_outdoorActivitites;

    public function __construct($fname, $lname, $age, $gender, $phone, $indoorActivities,
                                $outdoorActivities)
    {
        //parent::__construct();
         parent::__construct($fname, $lname, $age, $gender, $phone);
      /*  $this->fname = $fname;
        $this->lname = $lname;
        $this->age = $age;
        $this->gender = $gender;
        $this->phone = $phone;*/
        $this->_indoorActivities = $indoorActivities;
        $this->_outdoorActivitites = $outdoorActivities;
    }

    /**
     * @return mixed
     */
    public function getIndoorActivities()
    {
        return $this->_indoorActivities;
    }

    /**
     * @param mixed $indoorActivities
     */
    public function setIndoorActivities($indoorActivities)
    {
        $this->_indoorActivities = $indoorActivities;
    }

    /**
     * @return mixed
     */
    public function getOutdoorActivitites()
    {
        return $this->_outdoorActivitites;
    }

    /**
     * @param mixed $outdoorActivities
     */
    public function setOutdoorActivities($outdoorActivities)
    {
        $this->_outdoorActivitites = $outdoorActivities;
    }

}