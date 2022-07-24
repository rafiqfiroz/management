

let Login = require('../components/backend/login/login.vue').default;
let LogOut = require('../components/backend/login/logout.vue').default;
let AdminHome = require('../components/backend/home.vue').default;

//----------------------Department Manage---------------
let AddDepartment = require('../components/backend/department/create.vue').default;
let AllDepartment = require('../components/backend/department/index.vue').default;
let EditDepartment = require('../components/backend/department/edit.vue').default;

//----------------------Student Manage---------------
let AddStudent = require('../components/backend/student/create.vue').default;
let AllStudent = require('../components/backend/student/index.vue').default;
let EditStudent = require('../components/backend/student/edit.vue').default;

//----------------------Student Manage---------------
let AddResult = require('../components/backend/result/create.vue').default;
let AllResult = require('../components/backend/result/index.vue').default;
let EditResult = require('../components/backend/result/edit.vue').default;





export const routes = [
    { path: '/login_admin', component: Login,name:'login_admin',meta:{title:"Login"} },
    { path: '/admin_home', component: AdminHome,name:'admin_home',meta:{title:"Admin Dashboard"}},
    { path: '/Logout', component: LogOut,name:'Logout'},

    //----------------Department Manage------------
    {path:'/add_department',component:AddDepartment,name:'add_department',meta:{title:"Add Department"}},
    {path:'/all_department',component:AllDepartment,name:'all_department',meta:{title:"All Department"}},
    {path:'/edit_department/:id',component:EditDepartment,name:'edit_department',meta:{title:"Edit Department"}},
    
    //----------------Student Manage------------
    {path:'/add_student',component:AddStudent,name:'add_student',meta:{title:"Add Student"}},
    {path:'/all_student',component:AllStudent,name:'all_student',meta:{title:"All Student"}},
    {path:'/edit_student/:id',component:EditStudent,name:'edit_student',meta:{title:"Edit Student"}},

     //----------------Result Manage------------
     {path:'/add_result',component:AddResult,name:'add_result',meta:{title:"Add Result"}},
     {path:'/all_result',component:AllResult,name:'all_result',meta:{title:"All Result"}},
     {path:'/edit_result/:id',component:EditResult,name:'edit_result',meta:{title:"Edit Result"}},
];