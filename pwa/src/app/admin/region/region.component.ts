import { Component, OnInit, ViewChild } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import {MatPaginator} from '@angular/material/paginator';
import {MatSort} from '@angular/material/sort';
import {MatTableDataSource} from '@angular/material/table';
import { CoreService } from 'src/app/core/core.service';
import { RegionService } from 'src/app/services/region.service';
import { RegionFormComponent } from './region-form/region-form.component';

@Component({
  selector: 'app-region',
  templateUrl: './region.component.html',
  styleUrls: ['./region.component.scss']
})
export class RegionComponent implements OnInit {

  displayedColumns: string[] = ['id', 'label', 'action'];
  dataSource!: MatTableDataSource<any>;

  @ViewChild(MatPaginator) paginator!: MatPaginator;
  @ViewChild(MatSort) sort!: MatSort;

  constructor(
    public _dialog: MatDialog, 
    private _regionService: RegionService,
    private _coreService: CoreService) {}
    
  ngOnInit(): void {
    this.getRegionList()
  }
  openDialog() {
    const dialogRef = this._dialog.open(RegionFormComponent);

    dialogRef.afterClosed().subscribe({
      next: (val) => {
        if (val) {
          this.getRegionList();
        }
      }
    });
  }

  getRegionList() {
    this._regionService.getList().subscribe({
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
    this._regionService.delete(id).subscribe({
      next: (res) => {
        this._coreService.openSnackBar('Region deleted!', '')
        this.getRegionList();
      },
      error: (err) => {
        console.log(err);
      }
    });
  }

  openEditForm(data: any) {
    const dialogRef = this._dialog.open(RegionFormComponent, {
      data
    });
    
    dialogRef.afterClosed().subscribe({
      next: (val) => {
        if (val) {
          this.getRegionList();
        }
      }
    });
  }
}
