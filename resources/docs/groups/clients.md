# Clients

Managing Clients

Class ClientController.

## GET clients.


List all the clients

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/clients?paginate=19&orderBy=et&sortBy=eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/clients"
);

let params = {
    "paginate": "19",
    "orderBy": "et",
    "sortBy": "eum",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "title": "FasTrax"
        },
        {
            "id": 2,
            "title": "Smocker Choice"
        },
        {
            "id": 3,
            "title": "TCS"
        }
    ],
    "links": {
        "first": "http:\/\/localhost:8000\/api\/v1\/clients?page=1",
        "last": "http:\/\/localhost:8000\/api\/v1\/clients?page=4",
        "prev": null,
        "next": "http:\/\/localhost:8000\/api\/v1\/clients?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 4,
        "path": "http:\/\/localhost:8000\/api\/v1\/clients",
        "per_page": "5",
        "to": 5,
        "total": 19
    }
}
```
> Example response (200):

```json
{
    "data": [
        {
            "id": 99,
            "title": "natus"
        },
        {
            "id": 100,
            "title": "quia"
        }
    ],
    "links": {
        "first": "\/?page=1",
        "last": "\/?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "\/",
        "per_page": "10",
        "to": 2,
        "total": 2
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/clients`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>paginate</b></code>&nbsp;          <i>optional</i>    <br>
    which page to show. Example :12

<code><b>orderBy</b></code>&nbsp;          <i>optional</i>    <br>
    order by accending and descending. Example :ASC or DESC

<code><b>sortBy</b></code>&nbsp;          <i>optional</i>    <br>
    Sort By any database column. Example :created_at



## POST Client


Create the Client.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"\"FasTrax\""}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "\"FasTrax\""
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 101,
        "title": "ipsum"
    }
}
```

### Request
<small class="badge badge-black">POST</small>
 **`api/v1/clients`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>title</b></code>&nbsp; <small>string</small>     <br>
    Name of the Client.



## GET Client


Return the Specific Client.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/clients/1?clientId=qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/clients/1"
);

let params = {
    "clientId": "qui",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "title": "FasTrax"
    }
}
```
> Example response (200):

```json
{
    "data": {
        "id": 102,
        "title": "recusandae"
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/clients/{client}`**

<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<code><b>clientId</b></code>&nbsp;          <i>optional</i>    <br>
    id of the client. Example :1



## Update Client


Update the Client.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/v1/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"\"FasTrax\""}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "\"FasTrax\""
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 103,
        "title": "excepturi"
    }
}
```

### Request
<small class="badge badge-darkblue">PUT</small>
 **`api/v1/clients/{client}`**

<small class="badge badge-purple">PATCH</small>
 **`api/v1/clients/{client}`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>title</b></code>&nbsp; <small>string</small>     <br>
    Name of the Client.



## Delete Client


Delete the Client.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/v1/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":1}'

```

```javascript
const url = new URL(
    "http://localhost/api/v1/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 1
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "The Client was successfully deleted."
}
```

### Request
<small class="badge badge-red">DELETE</small>
 **`api/v1/clients/{client}`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>id</b></code>&nbsp; <small>integer</small>     <br>
    Id of the client.




