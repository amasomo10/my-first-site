from django.urls import path
from . import views

urlpatterns = [
    path('', views.home, name='home'),
    path('about/', views.about, name='about'),
    path('projects/', views.projects, name='projects'),
    path('calculation/', views.calculation, name='calculation'),
    path('contact/', views.contact, name='contact'),
    path('contact/contact.php/', views.contact, name='contact'),
]
