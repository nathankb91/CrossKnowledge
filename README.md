# CrossKnowledge Challenges

![PHP](https://img.shields.io/badge/php-8.0-green)
![NGINX](https://img.shields.io/badge/nginx-latest-blue)
![Redis](https://img.shields.io/badge/redis-3.12-red)
![Docker](https://img.shields.io/badge/docker-latest-purple)

Resolution of CrossKnowledge challenges described [here](https://gist.github.com/pxotox/e6f2190685d70f91a2439c9f5b5b482e).

## Requirements

```
* Docker
* Docker Compose
```

## Installation

```
docker-compose up --build
```

### Cache function Challenge

URL: http://localhost:8080

To test the feature I make a request to [Bacon Ipsum](https://baconipsum.com/json-api/) and each request made to the API retrieves a different response at intervals of  5 seconds, so every 5 seconds the text shown must be different.

### Date formatting Challenge

URL: http://localhost:8081

### Apply style Challenge

URL: http://localhost:8082