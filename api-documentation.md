# Api documentation

## Description

Api module delivery CRUD functionality for managing Frequently Asked Quetions contetn.

### 1. Get all FAQ's wit "active" status:
* HTTP method: GET
* Endpoint: http://glue.de.spryker.local/faqs

### 2. Get FAQ by ID:
* HTTP method: GET
* Endpoint: http://glue.de.spryker.local/faqs/10 - where "10" is existing FAQ id. All FAQs ids are available at http://glue.de.spryker.local/faqs endpoint.

### 3. Create new FAQ:
* HTTP method: POST
* Endpoint: http://glue.de.spryker.local/faqs
* json body example:
```bash
{
  "data": {
   "type": "faqs",
        "attributes": {
            "question": "Bgain traps napping?",
            "answer": "Yborne sleep cums captain's by icy"
        }
  }
}
```
* Success response message:
```bash
{
    "errors": [
        {
            "detail": "Faq was created.",
            "status": "200"
        }
    ]
}
```
### 4. Update existing FAQ:
* HTTP method: PATCH
* Endpoint: http://glue.de.spryker.local/faqs/10 - where "10" is existing FAQ id. All FAQs ids are available at http://glue.de.spryker.local/faqs endpoint.
* json example body:
```bash
{
  "data": {
    "type": "faqs",
        "id": "10",
        "attributes": {
            "question": "Bgain traps napping???",
            "answer": "Yborne sleep cums captain's by icy",
            "isActive": true
        }
  }
}
```
* Success response message:
```bash
{
    "errors": [
        {
            "detail": "Faq updated",
            "status": 201
        }
    ]
}
```
### 5. Delete FAQ.
* HTTP method: DELETE
* Endpoint: http://glue.de.spryker.local/faqs/10 - where "10" is existing FAQ id. All FAQs ids are available at http://glue.de.spryker.local/faqs endpoint.
* Success response message:
```bash
{
    "errors": [
        {
            "detail": "Faq deleted.",
            "status": "200"
        }
    ]
}
```
