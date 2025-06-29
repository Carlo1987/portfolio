import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms'; 
import { HttpClientModule } from '@angular/common/http'; 
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';


import { AboutmeComponent } from './components/aboutme/aboutme.component';
import { ContactComponent } from './components/contact/contact.component';
import { SkillsComponent } from './components/skills/skills.component';
import { ProjectsComponent } from './components/projects/projects.component';
import { HomeComponent } from './components/home/home.component';
import { ErrorComponent } from './components/error/error.component';
import { LinksComponent } from './components/links/links.component';
import { LoadingComponent } from './components/loading/loading.component';


@NgModule({
  declarations: [
    AppComponent,
    AboutmeComponent,
    ContactComponent,
    SkillsComponent,
    ProjectsComponent,
    HomeComponent,
    ErrorComponent,
    LinksComponent,
    LoadingComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
