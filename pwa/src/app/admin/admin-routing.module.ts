import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AgencyComponent } from './agency/agency.component';
import { RegionComponent } from './region/region.component';
import { TerritoryComponent } from './territory/territory.component';

const routes: Routes = [
  {
    path: 'region',
    component: RegionComponent,
    data: {
      breadcrumb: 'Régions'
    }
  },
  {
    path: 'territory',
    component: TerritoryComponent,
    data: {
      breadcrumb: 'Territoires'
    }
  },
  {
    path: 'agency',
    component: AgencyComponent,
    data: {
      breadcrumb: 'Agences'
    }
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AdminRoutingModule { }
