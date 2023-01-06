# vtu-php-project

# Task
## System about automobiles.
The system is used to keep data about:
* **automobiles** - *model*, *manufacturer*, *production year*, *kilometer age*
* **manufacturers** - *name*, *founded year*
* **models** - *name*, (link to <ins>manufacturer</ins>)

Features to be had:
* **search** by *year*, *model* and *manufacturer*

---

## Models
* Manufacturer  
* Model  
* Vehicle

## Relations
* Manufacturer - Model (**one-to-many**)
* Model - Vehicle (**one-to-many**)
* Manufacturer - Vehicle (**many-to-many**)

## Primary Keys
* Manufacturer - Id
* Model - Id
* Vehicle - Id

## Foreign Keys
* Model - ManufacturerId
* Vehicle - ModelId

---
