import { Component, OnInit, ViewChild } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import {MatPaginator} from '@angular/material/paginator';
import {MatSort} from '@angular/material/sort';
import {MatTableDataSource} from '@angular/material/table';
import { CoreService } from 'src/app/core/core.service';
import { AgencyService } from 'src/app/services/agency.service';
import { AgencyFormComponent } from './agency-form/agency-form.component';

@Component({
  selector: 'app-agency',
  templateUrl: './agency.component.html',
  styleUrls: ['./agency.component.scss']
})
export class AgencyComponent implements OnInit{
  displayedColumns: string[] = ['id', 'label', 'code', 'action'];
  dataSource!: MatTableDataSource<any>;

  @ViewChild(MatPaginator) paginator!: MatPaginator;
  @ViewChild(MatSort) sort!: MatSort;

  constructor(
    public _dialog: MatDialog, 
    private _agencyService: AgencyService,
    private _coreService: CoreService) {}
    
  ngOnInit(): void {
    this.getAgencyList()
  }
  openDialog() {
    const dialogRef = this._dialog.open(AgencyFormComponent);

    dialogRef.afterClosed().subscribe({
      next: (val) => {
        if (val) {
          this.getAgencyList();
        }
      }
    });
  }

  getAgencyList() {
    this._agencyService.getList().subscribe({
      next: (res) => {
        this.dataSource = new MatTableDataSource(res);
        this.dataSource.sort = this.sort;
        this.dataSource.paginator = this.paginator;
      },
      error: (err) => {
        console.log(err)
      }
    });
  }

  applyFilter(event: Event) {
    const filterValue = (event.target as HTMLInputElement).value;
    this.dataSource.filter = filterValue.trim().toLowerCase();

    if (this.dataSource.paginator) {
      this.dataSource.paginator.firstPage();
    }
  }

  deleteRegion(id: number) {
    this._agencyService.delete(id).subscribe({
      next: (res) => {
        this._coreService.openSnackBar('Agency deleted!', '')
        this.getAgencyList();
      },
      error: (err) => {
        console.log(err);
      }
    });
  }

  openEditForm(data: any) {
    const dialogRef = this._dialog.open(AgencyFormComponent, {
      data
    });
    
    dialogRef.afterClosed().subscribe({
      next: (val) => {
        if (val) {
          this.getAgencyList();
        }
      }
    });
  }
}
