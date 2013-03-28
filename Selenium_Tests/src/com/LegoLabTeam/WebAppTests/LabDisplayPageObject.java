package com.LegoLabTeam.WebAppTests;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.FluentWait;
import org.openqa.selenium.support.ui.Wait;



public class LabDisplayPageObject 
{
	private final WebDriver driver;  
	  
    public LabDisplayPageObject(WebDriver newDriver) 
    {  
        driver = newDriver;  
        Wait<WebDriver> wait = new FluentWait<WebDriver>(driver)  
           .withTimeout(20, TimeUnit.SECONDS)  
           .pollingEvery(2, TimeUnit.SECONDS);  
  
        wait.until(ExpectedConditions.titleIs("Tiger Automotive Lab Status"));  
    }  
    
    public static LabDisplayPageObject navigateToSelf(WebDriver driver, String baseUrl)
    {
    	driver.get(baseUrl + "Cell%20Overview.php");
    	return new LabDisplayPageObject(driver);
    }
    
    public Cell1DisplayPageObject navigateToCell1()
    {
    	driver.findElement(By.id("cell1Station1")).click();
    	return new Cell1DisplayPageObject(driver);
    }
    
    public Cell2DisplayPageObject navigateToCell2()
    {
    	driver.findElement(By.id("cell2Station1")).click();
    	return new Cell2DisplayPageObject(driver);
    }
    
    public Cell3DisplayPageObject navigateToCell3()
    {
    	driver.findElement(By.id("cell3Station1")).click();
    	return new Cell3DisplayPageObject(driver);
    }

}
