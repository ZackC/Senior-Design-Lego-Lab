package com.LegoLabTeam.WebAppTests;

import junit.framework.Test;
import junit.framework.TestSuite;



/***
 * The main class for testing our web app GUI.
 * @author Zack Coker
 *
 */
public class WebAppTestMain {

	public static Test suite() {
	    TestSuite suite = new TestSuite();
	    suite.addTestSuite(NavigationTests.class);
	    return suite;
	  }

	  public static void main(String[] args) {
	    junit.textui.TestRunner.run(suite());
	  }

}
