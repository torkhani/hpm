import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, NavigationEnd, Router} from '@angular/router';
import {Title} from '@angular/platform-browser';

@Component({
  selector: 'app-breadcrumbs',
  templateUrl: './breadcrumbs.component.html',
  styleUrls: ['./breadcrumbs.component.scss']
})
export class BreadcrumbsComponent implements OnInit {
  tempState = [];
  breadcrumbs = [{
    label: 'Dashbord',
    status: false,
    url: ''
  }];
  constructor(private router:Router, private route:ActivatedRoute, private titleService: Title) {
   
  }

  ngOnInit() {
  }

}
