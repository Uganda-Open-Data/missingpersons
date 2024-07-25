<p align="center"><a href="https://missingpersonsug.org/" target="_blank"><img src="public/media/image_of_person.jpg" width="400" alt="Missing Person in Uganda"></a></p>

## Missing persons in Uganda Backend
This is the official backend for the Missing persons UG.

## How to setup
It's a Laravel Project so the defaults apply.

## Usage
It's serves the API for victims. The end point is 
`https://dashboard.missingpersonsug.org/api/victims`

That returns the data of all the missing persons in the format below

```
{
      "data": [
        {
            "id": 1,
            "name": "Reign Omusoyisoyi",
            "nickname": "",
            "gender": "Male",
            "x_handle_full": "https:://x.com/maulanareign256",
            "x_handle": "@maulanareign256",
            "photo_url": "https://ms.styxtechgroup.com/media/reign_maulana.jpg",
            "status": "Arrested",
            "holding_location": null,
            "security_organ": null,
            "status_date": "Wed, Jul 24, 2024 9:30 AM",
            "notes": null
        }
      ]
}
```