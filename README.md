# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

# REST Quiz API - 0.2.0

#### HTTP Domain

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
