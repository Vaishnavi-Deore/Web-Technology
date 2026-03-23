import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule, FormBuilder, Validators, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule],
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {

  loginForm: FormGroup;

  constructor(private fb: FormBuilder, private router: Router) {

    this.loginForm = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required]
    });
  }

  onSubmit() {

    if (this.loginForm.valid) {

      const storedUser = JSON.parse(localStorage.getItem('user') || '{}');

      if (
        storedUser.email === this.loginForm.value.email &&
        storedUser.password === this.loginForm.value.password
      ) {

        alert("Login Successful!");
      } else {
        alert("Invalid Email or Password");
      }

    } else {
      alert("Please fill all fields");
    }
  }

  goToRegister() {
    this.router.navigate(['/register']);
  }
}