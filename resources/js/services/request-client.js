import Axios from "axios";

const requestClient = Axios.create({
    baseURL: "/api",
    timeout: 5000,
});

// Add a request interceptor
requestClient.interceptors.request.use(function (config) {
    // Do something before request is sent
    return config;
}, function (error) {
    // Do something with request error
    return Promise.reject(error);
});

// Add a response interceptor
requestClient.interceptors.response.use(function (response) {
    // Any status code that lie within the range of 2xx cause this function to trigger
    // Do something with response data
    return response;
}, function (error) {
    return Promise.reject(error);
});

export default requestClient;