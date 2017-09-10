let urls = {};
urls['api'] = "https://researchcoder.com/api";
urls['login'] = urls['api'] + "/users/login";
urls['register'] = urls['api'] + "/users/register";
urls['renew'] = urls['api'] + "/renewToken";
urls['resetPasswordCallback'] = "https://researchcoder.com/reset-password.html";

if (localStorage.hostOverride) {
    urls['api'] = localStorage.hostOverride;
    urls['login'] = urls['api'] + "/users/login";
    urls['register'] = urls['api'] + "/users/register";
    urls['renew'] = urls['api'] + "/renewToken";
    urls['resetPasswordCallback'] = "https://www.youtube.com/watch?v=xfr64zoBTAQ";
}

function getUrl(name) {
    return urls[name];
}

/* Development */
function localhost(  ){
    localStorage.hostOverride = "http://localhost:8080";
    window.location.reload();
}
function defaulthost() {
    delete localStorage.hostOverride;
    window.location.reload();
}

export {
    getUrl,
    /* development */
    localhost,
    defaulthost
};