<?php
namespace Dev\Pub\Entity;


/**
 * 
 * @Table(name="post")
 * @Entity()
 * 
 */

 
class Post 
{
   

    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Column(name="author_name", type="string", length=50)
     */
    private $author_name;

    /**
     * @Column(name="author_ID", type="integer")
     */
    private $author_ID;

    /**
     * @Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @Column(name="message", type="text")
     */
    private $message;

        /**
     * @Column(name="excerpt", type="text")
     */
    private $excerpt;

     /**
     * @Column(name="post_date", type="datetime")
     */
    private $post_date;

    /**
     * @Column(name="number_of_post", type="integer", nullable=false)
     */
    private $number_of_post;
    

    /**
     * 
     * Getters and setters
     */



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set authorID.
     *
     * @param int $authorID
     *
     * @return Post
     */
    public function setAuthorID($authorID)
    {
        $this->author_ID = $authorID;

        return $this;
    }

    /**
     * Get authorID.
     *
     * @return int
     */
    public function getAuthorID()
    {
        
        return $this->author_ID;
    }

    /**
     * Set authorName.
     *
     * @param string $authorName
     *
     * @return Post
     */
    public function setAuthorName($authorName)
    {
        $this->author_name = $authorName;

        return $this;
    }

    /**
     * Get authorName.
     *
     * @return string
     */
    public function getAuthorName()
    {
        return $this->author_name;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set message.
     *
     * @param string $message
     *
     * @return Post
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }


    /**
     * Get message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set excerpt.
     *
     * @param string $excerpt
     *
     * @return Post
     */
    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;

        return $this;
    }


    /**
     * Get excerpt.
     *
     * @return string
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }


    /**
     * Set postDate.
     *
     * @param \DateTime $postDate
     *
     * @return Post
     */
    public function setPostDate($postDate)
    {
        $this->post_date = $postDate;

        return $this;
    }

    /**
     * Get postDate.
     *
     * @return \DateTime
     */
    public function getPostDate()
    {
        return $this->post_date;
    }

    /**
     * Set numberOfPost.
     *
     * @param int $numberOfPost
     *
     * @return Post
     */
    public function setNumberOfPost($numberOfPost)
    {
        $this->number_of_post = $numberOfPost;

        return $this;
    }

    /**
     * Get numberOfPost.
     *
     * @return int
     */
    public function getNumberOfPost()
    {
        return $this->number_of_post;
    }
}
