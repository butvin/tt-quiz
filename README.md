# REST Quiz API - 0.2.0

#### Lumen PHP Framework
#### HTTP Domain
#### Allowed Methods

GET, POST, PUT, DELETE

###### Allowed routes

### GET:    /

Start point to the Application

### GET:    /api/v1


Start point to the Application API

### GET:    /api/v1/polls

Get all polls/question/quizzes etc.

### POST:    /api/v1/polls

Create a new poll

### GET:    /api/v1/polls/{id}

Get poll by id

### PUT:    /api/v1/polls/{id}

Update poll by id

### DELETE: /api/v1/polls/{id}

Delete poll by id

### GET:    /api/v1/polls/{id}/options

One poll options list

### GET:    /api/v1/polls/{id}/options/{option_id}

Get one sub-option from options list

### GET:    /api/v1/polls/{id}/options/{option_id}/sub

Sub-option list

**Query parameters:**

_integer_ **id**, **option_id**
Entity ids
