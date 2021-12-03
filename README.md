# Pangaea Notification System
A simple HTTP notification system. A server (or set of servers) will keep track of topics ->
subscribers where a topic is a string and a subscriber is an HTTP endpoint. When a message is published on a topic, it
should be forwarded to all subscriber endpoints.

Publisher Server Endpoints


## Commands to run
1) composer install
2) npm install
3) php artisan migrate

## Note
1) MySQL: Make sure to connect with MySQL first.
   
## Dashboard
![Screenshot from 2021-12-03 14-25-42](https://user-images.githubusercontent.com/36469012/144578688-2d38168d-1a77-4eae-a91f-9dced4972bfe.png)


## Note
Make sure to create the topic first via calling topic post API

## Calling an API[site_url/api/topic] (POST Request) with valid data
**Expected Body:** 
```
{
   	"name" : string
}
```

**Required Headers:** 
```
{
    Accept: application/json,
    Content-Type: application/json
}
```

**Success Response Example:** 
```
{
    "data": {
        "message": {
            "name": "topicone",
            "slug": "iWhPw",
            "created_at": "2021-12-03T09:07:31.000000Z",
            "updated_at": "2021-12-03T09:07:31.000000Z"
        },
        "statusCode": 201
    }
}
```



![Screenshot from 2021-12-02 20-59-32](https://user-images.githubusercontent.com/36469012/144459973-1157611d-bec3-4296-b840-e440fe2ba1d2.png)

## Calling an API[site_url/api/topic] (POST Request) with invalid data
![Screenshot from 2021-12-02 21-20-47](https://user-images.githubusercontent.com/36469012/144461475-28ae5a63-26b1-4c1c-b7ba-def81ade680b.png)


## Calling an API[site_url/api/subscribe/{topic_slug}] with valid data 

**Expected Body:** 
```
{
   	"url" : string
}
```

**Required Headers:** 
```
{
    Accept: application/json,
    Content-Type: application/json
}
```

**Success Response Example:** 
```
{
    "data": {
        "message": {
            "url": "https://www.msn2.com",
            "topic": "topicone",
            "topic_slug": "iWhPw"
        },
        "statusCode": 200
    }
}
```

![Screenshot from 2021-12-02 21-00-25](https://user-images.githubusercontent.com/36469012/144460012-438a6331-7718-407e-b361-8d0efae4def9.png)


## Calling an API[site_url/api/subscribe/{topic_slug}] with invalid data 
![Screenshot from 2021-12-02 21-19-52](https://user-images.githubusercontent.com/36469012/144461547-aa1fdbbc-0ed3-4bd1-83db-140b1a4166d9.png)


## Calling an API[site_url/api/publish/{topic_slug}] with valid data

**Expected Body:** 
```
{
   	"message" : text
}
```

**Required Headers:** 
```
{
    Accept: application/json,
    Content-Type: application/json
}
```

**Success Response Example:** 
```
{
    "data": {
        "message": {
            "topic": "topicone",
            "topic_slug": "iWhPw",
            "data": "lorem ipsum"
        },
        "statusCode": 201
    }
}
```


![Screenshot from 2021-12-02 21-01-10](https://user-images.githubusercontent.com/36469012/144460023-81d2e8c2-5910-4af5-ae18-2a752c356737.png)

## Calling an API[site_url/api/publish/{topic_slug}] with invalid data
![Screenshot from 2021-12-02 21-21-11](https://user-images.githubusercontent.com/36469012/144461615-639d5159-b493-4ccc-9a79-93a16cd9b685.png)


## Telescope

![Screenshot from 2021-12-02 21-02-19](https://user-images.githubusercontent.com/36469012/144460104-5c277596-48f6-4451-abe1-83edae4a1851.png)
![Screenshot from 2021-12-02 21-02-48](https://user-images.githubusercontent.com/36469012/144460129-66c884b0-e91c-4a79-bb7d-950663958078.png)
![Screenshot from 2021-12-02 21-03-15](https://user-images.githubusercontent.com/36469012/144460185-6322aefa-44e8-42bd-868f-9c95fe42cb5d.png)


