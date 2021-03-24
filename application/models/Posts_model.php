<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model{

	public function __construct() {

		parent::__construct();
		//$this->load->database();

	}

	public function getPostById($postId){
		
		$Fields1 = "tp1.headline,tp1.url,tp1.image,tp1.dateCreated,tp1.datePublished,tp1.inLanguage,tp1.contentLocation,tp1.articleSection,tp1.articleBody,tp1.keywords";
		$Fields2 = ",tpublisher.publisherName,tpublisher.publisherUrl";
		$Fields3 = ",tblauthor.authorName,tblauthor.authorUrl";
		$Fields4 = ",tbllogo.logoWidth,tbllogo.logoheight,tbllogo.logoUrl";
		$Fields = $Fields1.$Fields2.$Fields3.$Fields4;
		$where = "and tp1.active = 1 and tp1.postId = ".$postId;
		$SQL = "SELECT $Fields FROM `tblpost` tp1
				left join tblpublisher tpublisher on tp1.`publisherId` = tpublisher.publisherId
				left join tbllogo on tpublisher.publisherLogoId=tbllogo.logoId
				left join tblauthor on tp1.`authorId`=tblauthor.authorId where 1 =1 $where";
		$query = $this->db->query($SQL);
		$results = array();
		foreach ($query->result() as $result) {
			$results[] = $result;
		}
		return $results;
	}
	
	public function get_all_entries() {
		$Fields1 = "tp1.headline,tp1.url,tp1.image,tp1.dateCreated,tp1.datePublished,tp1.inLanguage,tp1.contentLocation,tp1.articleSection,tp1.articleBody,tp1.keywords";
		$Fields2 = ",tpublisher.publisherName,tpublisher.publisherUrl";
		$Fields3 = ",tblauthor.authorName,tblauthor.authorUrl";
		$Fields4 = ",tbllogo.logoWidth,tbllogo.logoheight,tbllogo.logoUrl";
		$Fields = $Fields1.$Fields2.$Fields3.$Fields4;
		$where = "where tp1.active = 1";
		$SQL = "SELECT $Fields FROM `tblpost` tp1
			left join tblpublisher tpublisher on tp1.`publisherId` = tpublisher.publisherId
			left join tbllogo on tpublisher.publisherLogoId=tbllogo.logoId
			left join tblauthor on tp1.`authorId`=tblauthor.authorId $where";
		  $query = $this->db->query($SQL);
		  $results = array();
		  foreach ($query->result() as $result) {
			$results[] = $result;
		  }
		  return $results;
	}

	public function deletePost($id){
		$result = false;
		$Where ="and `tblpost`.`postId` = $id";

		$SQL = "UPDATE `tblpost` SET `active` = '0' where 1=1 $Where";
		$query = $this->db->query($SQL);
		if($this->db->affected_rows()>0) $result = true;
		return $result;
	}

	public function insertPost($headline,$url,$image,$dateCreated,$datePublished,$inLanguage,$contentLocation,$authorId,$publisherId,$articleSection,$articleBody,$keywords,$active){
		$SQL = "INSERT INTO `tblpost` ( `headline`, `url`, `image`, `dateCreated`, `datePublished`, `inLanguage`, `contentLocation`, `authorId`, `publisherId`, `articleSection`, `articleBody`, `keywords`, `active`)
		VALUES ('$headline','$url','$image','$dateCreated','$datePublished','$inLanguage','$contentLocation','$authorId','$publisherId','$articleSection','$articleBody','$keywords','$active');";
		$query = $this->db->query($SQL);

	}

	public function updatePost($tableName, $postId,$updArr){
		$result = false;
		$this->db->where('postId', "$postId");
		$this->db->update($tableName, $updArr);
		if($this->db->affected_rows()>0) $result = true;
		return $result;
	}
}



?>