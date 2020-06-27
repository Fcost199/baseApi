<?php

namespace celebre\src\models\classes;

class ReturnApi implements \JsonSerializable {

    private $data;
    private $message;
    private $pagination;
	
	/**
	 *
	 * @return array
	 */
	public function getData(): array{
		return $this->data;
	}

	/**
	 *
	 * @param array $data
	 * @return ReturnApi
	 */
	public function setData($data): ReturnApi{
		$this->data = $data;
		return $this;
	}
	/**
	 *
	 * @return string
	 */
	public function getMessage(): string{
		return $this->message;
	}
	/**
	 *
	 * @param string $message
	 * @return ReturnApi
	 */
	public function setMessage( string $message): ReturnApi{
		$this->message = $message;
		return $this;
	}
	/**
	 *
	 * @return array
	 */
	public function getPagination(): array{
		return $this->pagination;
	}
	/**
	 *
	 * @param array $pagination
	 * @return ReturnApi
	 */
	public function setPagination( array $pagination): ReturnApi{
		$this->pagination = $pagination;
		return $this;
	}

	public function insertMessage( string $newMessage ): ReturnApi {
		if ( !is_array( $this->message ) ) {
			if ( $this->message )
				$aMessage = $this->message;
			$this->message = array();
			array_push( $this->message, $aMessage );
		}
		array_push( $this->message, $newMessage );
		return $this;
	}

    public function jsonSerialize(){
		return get_object_vars($this);
	}

}