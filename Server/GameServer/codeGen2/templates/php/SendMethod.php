
		public function /*::SEND_METHOD_NAME::*/(/*::SENDMETHOD_REF_PARAMETERS::*/)
		{
			if(defined('TESTING') && TESTING){
				if(isset($this->callback["/*::SEND_METHOD_NAME::*/"])){
					$cb = $this->callback["/*::SEND_METHOD_NAME::*/"];
					$cls_obj = $cb[0];
					$function = $cb[1];	
					$cls_obj->$function(/*::SENDMETHOD_REF_PARAMETERS::*/);
				}		
				return 0;	
			}
			
			require_once($GLOBALS['GAME_ROOT'] . "protocol//*::XPACKET_CLASS_NAME::*/.php");
			$__xvpacketlen/*:int*/ = /*::XPACKET_CLASS_NAME::*/::_Size(/*::SENDMETHOD_REF_PARAMETERS::*/);
			$__xvbuf	= new XByteArray();
			//$__xvbuf->reserve($__xvpacketlen);
			
			
			$__xvres/*:int*/ = 0;
			
			if (DEBUG)
			{
			   $c = /*::XPACKET_CLASS_NAME::*/::_ClassFromParameters(/*::SENDMETHOD_REF_PARAMETERS::*/);
			   Logger::getLogger()->debug("/*::SEND_METHOD_NAME::*/");
			}
			
			if($this->useAMF)
			{
				$__xvres = /*::XPACKET_CLASS_NAME::*/::toAMFObject($__xvbuf,/*::SENDMETHOD_REF_PARAMETERS::*/);
			}
			else
			{
				$__xvres = /*::XPACKET_CLASS_NAME::*/::_ToBuffer($__xvbuf,/*::SENDMETHOD_REF_PARAMETERS::*/);
				if($__xvres !=$__xvpacketlen)
				{
					return -1;
				}
				if($this->_m_bOutputNetworkDetails)
				{
					$this->OutputNetworkDetails(true,/*::XPACKET_CLASS_NAME::*/::$_m_xcmd,$__xvbuf);
				}
			
			
			}

			$__xvres = $this->WriteDataToSocket($__xvbuf);
			return $__xvres;
		}

