import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AdminRoutingModule } from './admin-routing.module';
import {MatDialogModule} from '@angular/material/dialog';
import { AgencyComponent } from './agency/agency.component';
import { AgencyFormComponent } from './agency/agency-form/agency-form.component';
import { MatButtonModule } from '@angular/material/button';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatInputModule} from '@angular/material/input';
import {MatSelectModule} from '@angular/material/select';
import {MatSlideToggleModule} from '@angular/material/slide-toggle';
import {MatTableModule} from '@angular/material/table';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatIconModule } from '@angular/material/icon';
import {MatSnackBarModule} from '@angular/material/snack-bar';
import { RegionComponent } from './region/region.component';
import { RegionFormComponent } from './region/region-form/region-form.component';
import { TerritoryComponent } from './territory/territory.component';
import { TerritoryFormComponent } from './territory/territory-form/territory-form.component';

@NgModule({
  declarations: [
    AgencyComponent,
    AgencyFormComponent,
    RegionComponent,
    RegionFormComponent,
    TerritoryComponent,
    TerritoryFormComponent
  ],
  imports: [
    CommonModule,
    ReactiveFormsModule,
    FormsModule,
    AdminRoutingModule,
    MatDialogModule,
    MatButtonModule,
    MatFormFieldModule,
    MatInputModule,
    MatSelectModule,
    MatSlideToggleModule,
    MatTableModule,
    MatPaginatorModule,
    MatIconModule,
    MatSnackBarModule
  ]
})
export class AdminModule { }
