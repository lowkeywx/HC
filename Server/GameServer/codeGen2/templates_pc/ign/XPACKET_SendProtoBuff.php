<?php
/**
	Auto generated by xproto.exe
@author
	Dany
*/
require_once("XByteArray.php");


	class XPACKET_SendProtoBuff
	{
		    public static  $_m_xcmd/*:int*/=_EMSG_ServerInterface::CMSG_SendProtoBuff;

	    
		public $data="";/*UCHAR[]*/

	    
	    public function XPACKET_SendProtoBuff()
		{
	
		}
			
		public static function _Size($data/*:UCHAR[] */ )
		{
			$__xv	= 0;
			$i		=0;

            $__xv +=4;//LENGHT
            $__xv +=4;//_m_xcmd
            $__xv +=4;//XByteArray::GetDynamicLengthNumBytes(data.length);
            $__xv +=1*strlen($data);

			return $__xv;
		}
				
		public static function _ToBuffer($__dst/*XByteArray*/,$data/*:UCHAR[] */ )
		{
			$__xv	= 0;
			$i		=0;

			$__dst->writeInt32(XPACKET_SendProtoBuff::_Size($data/*:UCHAR[] */ ));
			$__xv +=4;
			$__dst->writeInt32(XPACKET_SendProtoBuff::$_m_xcmd);
			$__xv +=4;

            //Write codes of data
            //
            $__num = strlen($data);
            $__xv +=XByteArray::WriteDynamicArrayLength($__dst,$__num);
            $__dst->writeBinary($data,$__num);
            $__xv +=$__num;
            

			return $__xv;
		}
		
		public static function _ClassFromParameters($data/*:UCHAR[] */ )
		{
			$_class = new XPACKET_SendProtoBuff();

            $_class->data=$data;
			
			return $_class;
		}


		public function FromBuffer($__src/*:XByteArray*/)
		{
			$__xv					= 0;
			$i						=0;
			$__xvBeanSize	=0;


            //Read codes of __xvtemp1
            //
            if($__src->getBytesAvailable()>=4)
            {
                $this->__xvtemp1=$__src->readInt32();
                $__xv +=4;
            }
            else
            {
                return 0;
            }

            //Read codes of __xvtemp2
            //
            if($__src->getBytesAvailable()>=4)
            {
                $this->__xvtemp2=$__src->readInt32();
                $__xv +=4;
            }
            else
            {
                return 0;
            }

            //Read codes of data
            //
            $__data_arrlen = new XInteger();
            $__xv +=XByteArray::ReadDynamicArrayLength($__src,$__data_arrlen);
            if($__data_arrlen->_value<0)
            {
                return 0;
            }
            if($__src->getBytesAvailable()>=$__data_arrlen->_value)
            {
                $this->data=$__src->readBinary($__data_arrlen->_value);
                $__xv +=$__data_arrlen->_value;
            }
            else 
            {
                return 0;
            }
            

			return $__xv;
		}
		
		public function ToBuffer($__dst/*XByteArray*/)
		{
			return XPACKET_SendProtoBuff::_ToBuffer($__dst,$this->data );
		}
		
		public function Size()
		{
			return XPACKET_SendProtoBuff::_Size($this->data );
		}

    public  function FromXml(/*XP_XMLNODE_PTR*/ $pNode)
    {

        $this->data = XFROM_XML($this->data,$pNode,"data",4,"",0);

		  	return 0;
    }
    
    public  function   ToXml(/*XSTRING_STREAM & out*/)
    {
        $__xv_out="";

        $__xv_out .= XTO_XML($this->data,"data",4, 0);

        return $__xv_out;
    }
    
    public   function fromAMFObject($pNode)
    {
       
        
        $this->data = XFROM_AMFOBJECT($this->data,$pNode,"data",4,"",0);

        return 0;
    }
		
	private static function ParamDebugString($param)
    {
    	if (is_object($param))
    	{
    		return $param->ToDebugString();
    	}
    	else if (is_array($param))
    	{
    		$str = "(";
    		foreach($param as $p)
    		{
    			if( is_object($p) )
    			{
    				$str .= $p->ToDebugString().",";
			}
			else
			{
				$str .= strval($p).",";
			}
    		}
    		$str .= ")";
    		$str = str_replace(",)",")",$str);
    		return $str;
    	}
    	
    	return strval($param);
    } 
    
	public  function ToDebugString()
    {
    	$__xv_out  = "(";
    	
        $__xv_out .= "data=".$this->ParamDebugString($this->data).",";

    	
    	$__xv_out  .= ")";
    	
    	$__xv_out = str_replace(",)",")",$__xv_out);
    	
    	return $__xv_out;
    }
    
   	public static function toAMFObject($__dst/*XByteArray*/,$data/*:UCHAR[] */ )
		{
			$__xv	= 0;
			$i		=0;
      $obj = array();

        $obj["data"]=$data ;

      if(count($obj)>0)
      {
          $outBuffer  = WriteAMF3Object($obj);
          $__xv = strlen($outBuffer);
          $__xv+=8;
          $__dst->writeInt32($__xv);
          $__dst->writeInt32(XPACKET_SendProtoBuff::$_m_xcmd);
          $__dst->writeBinary($outBuffer,strlen($outBuffer));
      }
      else
      {
          $__xv =8;
          $__dst->writeInt32($__xv);
          $__dst->writeInt32(XPACKET_SendProtoBuff::$_m_xcmd);
      }
      
      
			return $__xv;
		}
	}
	
	
?>
