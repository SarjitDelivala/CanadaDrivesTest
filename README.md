
# About Project

This Project is created for an interview process. This is only API Project. 


# Setup Project on your Local

- Clone the project using `git clone` command.
- Go to directory and execute `composer install`.
- Execute `php artisan serve`

# Test APIs

APIs can be tested using `[Postman](https://www.postman.com/downloads/)`

## 1. List of Players (LeaderBoard)
- Method `GET`
- Endpoint `/api/players`
- Response: LeaderBoard based on Points scored by the players


## 2. Show Player Details
- Method `GET`
- Endpoint `/api/players/{player}`
- URL Param:
    - player: Player's id (integer / required)
- Response: Player details

## 3. Create Player
- Method `POST`
- Endpoint `/api/players`
- Request: 
  - `name` (string / required / max 50 characters)
  - `age` (integer / required / min 1 / max 100)
  - `address` (string / required / max 100 characters)
- Response: New Player Details

## 4. Update Player
- Method `PATCH`
- Endpoint `/api/players/{player}`
- URL Param:
    - player: Player's id (integer / required)
- Request:
  - `name` (string / optional / max 50 characters)
  - `age` (integer / optional / min 1 / max 100)
  - `points` (integer / optional / min 0)
  - `address` (string / optional / max 100 characters)
- Response: Updated Player details

## 5. Increment / Decrement Points
- Method `PATCH`
- Endpoint `/api/players/{player}/{action}`
- URL Param:
  - player: Player's id (integer / required)
  - action: (string / required) Possible values [increment / decrement]
- Response: LeaderBoard based on Points scored by the players


## 6. Delete Player
- Method `DELETE`
- Endpoint `/api/players/{player}`
- URL Param:
    - player: Player's id (integer / required)
- Response: Success Message
