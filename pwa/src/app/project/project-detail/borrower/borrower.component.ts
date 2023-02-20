import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-borrower',
  templateUrl: './borrower.component.html',
  styleUrls: ['./borrower.component.scss']
})
export class BorrowerComponent implements OnInit {

  @Input() 
  borrower!: any;
  
  constructor() { }

  ngOnInit(): void {
  }

}
