import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-project-show',
  templateUrl: './project-show.component.html',
  styleUrls: ['./project-show.component.scss']
})
export class ProjectShowComponent implements OnInit {

  activeLink = 'true';
  project!: any;
  
  constructor() { }

  ngOnInit(): void {
  }

}
