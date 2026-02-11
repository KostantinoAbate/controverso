import {landingNavbar} from "./modules/landingNavbar.js";
import {validator} from "./libs/validator.js";
import {initRegister} from "./modules/registerForm.js";
import {initParallax, useParallax} from "./libs/parallax.js";
import {laravelToast} from "./libs/toast.js";
import {initPersonalData} from "./modules/personalDataForm.js";

const routeLayout = window.routeLayout;
const routeName = window.routeName;
const routeHasForm = window.routeHasForm;

// Route Layouts Map
const admin = 'admin';
const auth = 'auth';
const blog = 'blog';
const landing = 'landing';
const profile = 'profile';

//Route Names Map
const register = 'register';
const personalData = 'landing.profile';

//General purpose
laravelToast();

if(routeLayout === landing) {
    landingNavbar();
    initParallax();
}
if(routeLayout === auth) {
    landingNavbar();
}
if (document.querySelector('[validate-form]')) {
    validator();
}
if(routeName === register) {
    initRegister();
}
if(routeName === personalData) {
    initPersonalData();
}
