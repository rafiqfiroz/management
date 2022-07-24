class Token{

    //------------Token Validate---------
    isValid(token){
        const payload = this.payload(token);
        if(payload){
            return payload.iss=="http://127.0.0.1:8000/api/auth/login" || "http://127.0.0.1:8000/api/auth/register" ? true : false
        }
  
        return false
      }
  
      //-----------Token splite send step And Decode Token ---------
      payload(token){
        const payload = token.split('.')[1];
        return this.decode(payload);
      }
  
      //-----------token decode atdbe method------------
  
      decode(payload){
          return JSON.parse(atob(payload));
      }


}

export default Token = new Token();