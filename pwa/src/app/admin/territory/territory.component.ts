import { Component, OnInit, ViewChild } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { MatPaginator } from '@angular/material/paginator';
import { MatSort } from '@angular/material/sort';
import { MatTableDataSource } from '@angular/material/table';
import { CoreService } from 'src/app/core/core.service';
import { TerritoryService } from 'src/app/services/territory.service';
import { TerritoryFormComponent } from './territory-form/territory-form.component';

@Component({
  selector: 'app-territory',
  templateUrl: './territory.component.html',
  styleUrls: ['./territory.component.scss']
})
export class TerritoryComponent implements OnInit {

  displayedColumns: string[] = ['id', 'label', 'action'];
  dataSource!: MatTableDataSource<any>;
  @ViewChild(MatPaginator) paginator!: MatPaginator;
  @ViewChild(MatSort) sort!: MatSort;

  constructor(
    public _dialog: MatDialog, 
    private _territoryService: TerritoryService,
    private _coreService: CoreService) {}
    ngOnInit(): void {
    this.getTerritoryList()
  }
  openDialog() {
    const dialogRef = this._dialog.open(TerritoryFormComponent);
    dialogRef.afterClosed().subscribe({
      next: (val) => {
        if (val) {
          this.getTerritoryList();
        }
      }
    });
  }

  getTerritoryList() {
    this._territoryService.getList().subscribe({
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
    this._territoryService.delete(id).subscribe({
      next: (res) => {
        this._coreService.openSnackBar('Region deleted!', '')
        this.getTerritoryList();
      },
      error: (err) => {
        console.log(err);
      }
    });
  }

  openEditForm(data: any) {
    const dialogRef = this._dialog.open(TerritoryFormComponent, {
      data
    });
    
    dialogRef.afterClosed().subscribe({
      next: (val) => {
        if (val) {
          this.getTerritoryList();
        }
      }
    });
  }
}
