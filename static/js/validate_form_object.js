/**
 +-------------------------------------------------------------------
 *  使用实例：
 +-------------------------------------------------------------------
 *  var validate = new validata_form()				实例化对象
 +-------------------------------------------------------------------
 *  if(!validate.username(username)){...}			  验证用户名
 *  if(!validate.common(common)){...}			 	  验证常规字符
 *  if(!validate.email(email)){...}			          验证电子邮件地址
 *  if(!validate.url(url)){...}						  验证URL地址
 *  if(!validate.telephone(telephone)){...}			  验证移动电话号码
 *  if(!validate.id_card(id_card)){...}				  验证身份证号码
 *  if(!validate.QQ(QQ)){...}						  验证腾讯QQ号
 *  if(!validate.zipcode(zipcode)){...}				  验证邮政编码
 *  if(!validate.number(number)){...}				  验证数字
 *  if(!validate.english_letter(english_letter)){...} 验证26个英文字母
 +-------------------------------------------------------------------
 *  上述仅为逻辑演示,本对象可灵活使用
 +-------------------------------------------------------------------
 */
 
function validate_form(){
	
	/**
	 * 验证用户名
	 * （大小写英文字母、汉字、数字、下划线组成的长度3-12个字节）
	 *
	 * @parameter string str	字符串
	 * @return Boolean
	 */
	this.username = function(str){	
		return str.match(/^([\u4E00-\u9FA5]|[\uFE30-\uFFA0]|[a-zA-Z0-9_]){3,12}$/);
	}
	
	/**
	 * 验证常规字符
	 * （只能输入大小写英文字母、汉字、数字、下划线）
	 *
	 * @parameter string str	字符串
	 * @return Boolean
	 */
	this.common = function(str){	
		return str.match(/^([\u4E00-\u9FA5]|[\uFE30-\uFFA0]|[a-zA-Z0-9_])*$/);
	}
	
	/**
	 * 验证电子邮件地址
	 *
	 * @parameter string str	字符串
	 * @return Boolean
	 */
	this.email = function(str){
		return str.match(/^(\w+\.)*\w+@(\w+\.)+[A-Za-z]+$/);
	}
	
	/**
	 * 验证URL地址
	 *
 	 * @parameter string $str	字符串
	 * @return Boolean
	 */
	this.url = function(str){
		//完整的匹配URL
		return str.match(/^https?:\/\/(\w*:\w*@)?[-\w.]+(:\d+)?(\/([\w\/_.]*(\?\S+)?)?)?$/);
	}
	
	/**
	 * 验证移动电话号码
     *
	 * @parameter string $str	字符串
	 * @return Boolean
	 */
	this.telephone = function(str){
		//中国移动134.135.136.137.138.139.150.151.152.157.158.159.187.188
		if(str.match(/^1(3[4-9]|5[012789]|8[78])\d{8}$/)){
			return true;}
		//中国联通130.131.132.133.155.156.185.186
		else if(str.match(/^1(3[0-3]|5[56]|8[56])\d{8}$/)){
			return true;}
		//中国电信133.153.180.189
		else if(str.match(/^1([35]3|8[09])\d{8}$/)){
			return true;}
		else{
			return false;
		}
	}
	
	/**
	 * 验证身份证号码
	 *
	 * @parameter string $str	字符串
	 * @return Boolean
	 */
	this.id_card = function(str){
		//中国的身份证为15位或18位
		return str.match(/^\d{15}$|^\d{18}$/);
	}
	
	/**
	 * 验证腾讯QQ号
	 *
	 * @parameter string str	字符串
	 * @return Boolean
	 */
	this.QQ = function(str){
		//腾讯QQ号从10000开始
		return str.match(/[1-9][0-9]{4,}/);
	}
	
	/**
	 * 验证邮政编码
	 *
	 * @parameter string $str	字符串
	 * @return Boolean
	 */
	 this.zipcode = function(str){
		//中国邮政编码为6位数字（第一位不为零）
		return str.match(/^[1-9]\d{5}$/);
	}
	
	/**
	 * 验证数字
	 * （只能输入数字）
	 *
	 * @parameter string $str	字符串
	 * @return Boolean
	 */
	 this.number = function(str){
		return str.match(/^[0-9]*$/);
	}
	
	/**
	 * 验证26个英文字母
	 * （只能输入英文字母）
	 *
	 * @parameter string $str	字符串
	 * @return Boolean
	 */
	 this.english_letter = function(str){
		return str.match(/^[A-Za-z]*$/);
	}
}