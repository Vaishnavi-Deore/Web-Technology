package com.college.etms.dto.task;

import com.college.etms.enums.TaskStatus;
import jakarta.validation.constraints.NotNull;
import lombok.AllArgsConstructor;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
public class TaskStatusUpdateDto {

    @NotNull(message = "Status is required")
    private TaskStatus status;
}
