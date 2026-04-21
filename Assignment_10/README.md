# Employee Task Management System

Spring Boot REST backend for managing faculty records and assigned departmental tasks in a college engineering department.

## Tech Stack

- Java 17
- Spring Boot 3.3.5
- Spring Data JPA / Hibernate
- MySQL
- Maven
- Lombok
- Swagger OpenAPI

## Project Structure

```text
Assignment_10
|-- pom.xml
|-- src/main/java/com/college/etms
|   |-- config
|   |-- controller
|   |-- dto
|   |-- entity
|   |-- enums
|   |-- exception
|   |-- repository
|   |-- service
|   |-- util
|-- src/main/resources/application.properties
|-- src/test/java/com/college/etms
```

## Features

- Employee CRUD
- Task CRUD
- Many-to-one relationship between `Task` and `Employee`
- Deadline tracking with `overdue` flag in task responses
- Validation for required fields and email format
- Global exception handling
- Pagination and sorting
- Swagger UI documentation

## API Base Paths

- `/api/employees`
- `/api/tasks`

## Important Endpoints

### Employee APIs

- `POST /api/employees`
- `GET /api/employees`
- `GET /api/employees/list`
- `GET /api/employees/{id}`
- `PUT /api/employees/{id}`
- `DELETE /api/employees/{id}`

### Task APIs

- `POST /api/tasks`
- `GET /api/tasks`
- `GET /api/tasks/list`
- `GET /api/tasks/{id}`
- `GET /api/tasks/employee/{employeeId}`
- `GET /api/tasks/employee/{employeeId}/list`
- `PUT /api/tasks/{id}`
- `PATCH /api/tasks/{id}/status`
- `DELETE /api/tasks/{id}`

## Sample JSON Requests

### Create Employee

```json
{
  "name": "Dr. Meera Sharma",
  "email": "meera.sharma@college.edu",
  "department": "Computer Science and Engineering",
  "designation": "Assistant Professor"
}
```

### Update Employee

```json
{
  "name": "Dr. Meera Sharma",
  "email": "meera.sharma@college.edu",
  "department": "Information Technology",
  "designation": "Associate Professor"
}
```

### Create Task

```json
{
  "title": "Prepare NBA Accreditation Report",
  "description": "Compile department outcomes, faculty data, and lab utilization details.",
  "assignedEmployeeId": 1,
  "deadline": "2026-05-15",
  "status": "PENDING",
  "priority": "HIGH"
}
```

### Update Task

```json
{
  "title": "Prepare NBA Accreditation Report",
  "description": "Compile the final department outcomes with revised lab utilization details.",
  "assignedEmployeeId": 1,
  "deadline": "2026-05-20",
  "status": "IN_PROGRESS",
  "priority": "HIGH"
}
```

### Update Task Status

```json
{
  "status": "COMPLETED"
}
```

## Pagination and Sorting Examples

- `/api/employees?page=0&size=5&sortBy=name&sortDir=asc`
- `/api/tasks?page=0&size=10&sortBy=deadline&sortDir=desc`
- `/api/tasks/employee/1?page=0&size=5&sortBy=priority&sortDir=asc`

## Swagger

After starting the application, open:

- `http://localhost:8080/swagger-ui.html`

## Browser UI

After starting the application, you can also use the built-in frontend at:

- `http://localhost:8080/`

## MySQL Configuration

Update these properties in `src/main/resources/application.properties` before running:

```properties
spring.datasource.username=root
spring.datasource.password=your_password
```

## Run the Project

```bash
mvn spring-boot:run
```
