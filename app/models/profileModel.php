<?php
class profileModel
{
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    /* === Exemple Code ===
    
    public function fetchAllExemple($search)
    {
        $this->db->query('SELECT * FROM posts WHERE post_name LIKE :search');
        $this->db->bind(':search', '%'.$search.'%');
        return $this->db->fetchAll();
    }
    
    */

    public function profileInformation($profile_id)
    {
        $this->db->query('SELECT * FROM profile WHERE profile_id = :profile_id');
        $this->db->bind(':profile_id', $profile_id);
        return $this->db->fetch();
    }

    public function editProfile($profile_id, $firstname, $lastname, $email)
    {
        $this->db->query('UPDATE profile SET firstname = :firstname, lastname = :lastname, email = :email WHERE profile_id = :profile_id');
        $this->db->bind(':profile_id', $profile_id);
        $this->db->bind(':firstname', $firstname);
        $this->db->bind(':lastname', $lastname);
        $this->db->bind(':email', $email);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
