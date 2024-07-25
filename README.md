<p align="center"><a href="https://missingpersonsug.org/" target="_blank"><img src="public/media/image_of_person.jpg" width="400" alt="Missing Person in Uganda"></a></p>

## Missing persons in Uganda Backend
This is a backend for the Missing persons UG which mirrors the official data file at https://github.com/wkambale/missingpersons/blob/main/data.json

## How to setup
It's a Laravel Project so the defaults apply and the requirements are:

1. PHP 8.2
2. MySQL 5.7 or 8.x

## Usage
It's serves the API for victims. The end point is 
`https://dashboard.missingpersonsug.org/api/victims`

That returns the data of all the missing persons in the format below

```
{
      "data": [
        {
            "id": 1,
            "name": "Jean Namukasa",
            "nickname": "Mama Jean",
            "gender": "Female",
            "x_handle_full": "https:://x.com/jean",
            "x_handle": "@jean",
            "photo_url": "https://dashboard.missingpersonsug.org/media/reign_maulana.jpg",
            "status": "Arrested",
            "holding_location": "Jinja Road Police Station ",
            "security_organ": "Police",
            "status_date": "Wed, Jul 24, 2024 9:30 AM",
            "notes": "Was taken away in a drone"
        }
      ]
}
```
