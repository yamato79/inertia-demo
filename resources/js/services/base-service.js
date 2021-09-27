import RequestClient from "./request-client";

const baseService = {
    create(endpoint, customFunctions = {}) {
        return {
            index: (payload = {}, headers = {}) => RequestClient.get(`/${endpoint}`, { params: payload, headers }),
            show: (id, payload = {}, headers = {}) => RequestClient.get(`/${endpoint}/${id}`, { params: payload, headers }),
            store: (payload = {}, headers = {}) => RequestClient.post(`/${endpoint}`, payload, headers),
            update: (id, payload = {}, headers = {}) => {
                if (typeof payload == typeof new FormData()) {
                    payload.append("_method", "PUT");
                } else {
                    payload._method = "PUT";
                }

                return RequestClient.post(`/${endpoint}/${id}`, payload, headers);
            },
            delete: (id, payload = {}, headers = {}) => RequestClient.delete(`/${endpoint}/${id}`, payload, headers),
            ...customFunctions,
        };
    },
};

export default baseService;