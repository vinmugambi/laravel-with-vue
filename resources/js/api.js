import axios from "axios";

axios.defaults.baseURL = "http://127.0.0.1:8000";

const csrfToken = document.querySelector("input[name=_token]").getAttribute("value")

export default axios;