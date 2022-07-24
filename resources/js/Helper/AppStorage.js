class AppStorage {


 //----------LocalStorage Set Token------------
 storeToken(token){
    localStorage.setItem('token', token);
}

//---------LocalStorage Set User--------

StoreUser(user){
    localStorage.setItem('user',user);
}

//--------localstorage store-------

Store(token,user){
    this.storeToken(token);
    this.StoreUser(user);
}

//-----------------Get Token And User-----

getToken(){
   localStorage.getItem('token');
}

getUser(){
    localStorage.getItem('user');
 }

//----------------Clear Token----------

Clear(){
    localStorage.removeItem('token');
    localStorage.removeItem('user');
}

}

export default AppStorage = new AppStorage();