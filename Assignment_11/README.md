# Assignment 11 - Build Automation with Maven and Gradle

This assignment restructures the existing `Assignment_10` Employee Task Management System into two separate build variants without changing business logic.

## Folder Structure

```text
Assignment_11
|-- README.md
|-- maven-project
|   |-- pom.xml
|   |-- README.md
|   `-- src
|-- gradle-project
|   |-- build.gradle
|   |-- settings.gradle
|   |-- README.md
|   `-- src
```

## Source Reuse

- All controllers, services, entities, repositories, DTOs, enums, exceptions, static files, and tests are copied from `Assignment_10`.
- Business logic is unchanged.
- Main application configuration in `src/main/resources/application.properties` is unchanged and still uses MySQL.

## Maven Version

From `Assignment_11/maven-project` run:

```bash
mvn clean install
mvn spring-boot:run
```

## Gradle Version

From `Assignment_11/gradle-project` run:

```bash
gradle build
gradle bootRun
```

## Application Properties

No changes were needed. Both projects use the same configuration:

```properties
spring.datasource.url=jdbc:mysql://localhost:3307/employee_task_db?createDatabaseIfNotExist=true&useSSL=false&serverTimezone=UTC
spring.datasource.username=root
spring.datasource.password=
spring.datasource.driver-class-name=com.mysql.cj.jdbc.Driver

spring.jpa.hibernate.ddl-auto=update
spring.jpa.show-sql=true
spring.jpa.properties.hibernate.format_sql=true

server.port=8080

springdoc.api-docs.path=/v3/api-docs
springdoc.swagger-ui.path=/swagger-ui.html
```

## Endpoint Validation

The same endpoints from `Assignment_10` are preserved in both builds:

- `/api/employees`
- `/api/tasks`
- `/swagger-ui.html`
- `/`

## Maven vs Gradle

| Aspect | Maven | Gradle |
|---|---|---|
| Build file | `pom.xml` | `build.gradle` |
| Style | XML and convention-driven | Groovy DSL and task-driven |
| Common commands | `mvn clean install`, `mvn spring-boot:run` | `gradle build`, `gradle bootRun` |
| Best fit | Standardized enterprise builds | Flexible and customizable builds |

## Notes

- Runtime still requires MySQL on `localhost:3307` with the credentials from `application.properties`.
- Build success depends on Maven and Gradle being installed locally and Java 17 being available.
