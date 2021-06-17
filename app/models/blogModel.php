<?php
class blogModel
{
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    /* === Exemple Code ===
    
    public function updateExemple($user_id, $username)
    {
        $this->db->query('UPDATE users SET username = :username WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':username', $username);
    
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    public function fetchAllExemple($search)
    {
        $this->db->query('SELECT * FROM posts WHERE post_name LIKE :search');
        $this->db->bind(':search', '%'.$search.'%');
        return $this->db->fetchAll();
    }
    
    */

    public function findArticle($id)
    {
        $this->db->query('SELECT * FROM posts WHERE post_id = :post_id');
        $this->db->bind(':post_id', $id);
        return $this->db->fetch();
    }

    public function findAllArticle()
    {
        $this->db->query('SELECT * FROM posts ORDER BY post_id DESC');
        return $this->db->fetchAll();
    }

    public function editBlog($id, $title, $slug, $image, $body)
    {
        $this->db->query('UPDATE posts SET title = :title, slug = :slug, image = :image, body = :body WHERE post_id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':title', $title);
        $this->db->bind(':slug', $slug);
        $this->db->bind(':image', $image);
        $this->db->bind(':body', $body);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}
