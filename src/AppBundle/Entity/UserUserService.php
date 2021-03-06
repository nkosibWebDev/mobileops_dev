<?php



/**
 * UserUserService
 */
class UserUserService
{
    /**
     * @var boolean
     */
    private $active = '1';

    /**
     * @var \DateTime
     */
    private $dateAdded = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    private $addedBy;

    /**
     * @var integer
     */
    private $userUserServiceId;

    /**
     * @var \UserProfile
     */
    private $userUserServiceProfile;

    /**
     * @var \LuService
     */
    private $userUserServiceName;


    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return UserUserService
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return UserUserService
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set addedBy
     *
     * @param string $addedBy
     *
     * @return UserUserService
     */
    public function setAddedBy($addedBy)
    {
        $this->addedBy = $addedBy;

        return $this;
    }

    /**
     * Get addedBy
     *
     * @return string
     */
    public function getAddedBy()
    {
        return $this->addedBy;
    }

    /**
     * Get userUserServiceId
     *
     * @return integer
     */
    public function getUserUserServiceId()
    {
        return $this->userUserServiceId;
    }

    /**
     * Set userUserServiceProfile
     *
     * @param \UserProfile $userUserServiceProfile
     *
     * @return UserUserService
     */
    public function setUserUserServiceProfile(\UserProfile $userUserServiceProfile = null)
    {
        $this->userUserServiceProfile = $userUserServiceProfile;

        return $this;
    }

    /**
     * Get userUserServiceProfile
     *
     * @return \UserProfile
     */
    public function getUserUserServiceProfile()
    {
        return $this->userUserServiceProfile;
    }

    /**
     * Set userUserServiceName
     *
     * @param \LuService $userUserServiceName
     *
     * @return UserUserService
     */
    public function setUserUserServiceName(\LuService $userUserServiceName = null)
    {
        $this->userUserServiceName = $userUserServiceName;

        return $this;
    }

    /**
     * Get userUserServiceName
     *
     * @return \LuService
     */
    public function getUserUserServiceName()
    {
        return $this->userUserServiceName;
    }
}


